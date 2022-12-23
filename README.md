```shellscript
$ composer require green-spot/formtagbinder
```

---

```php
$binder = new FormTagBinder\FormTagBinder();

echo $binder->text("name");
// <input type="text" name="name" value="">

echo $binder->email("email", ["required", "placeholder" => "info@example.com"]);
// <input type="email" name="email" value="" required placeholder="info@example.com">

foreach($binder->checkboxes(["a", "b", "c"], "categories") as $l => $cb){
  echo "<label>{$cb} {$l}</label>";
}
// <label><input type="checkbox" name="categories[]" value="a">
// <label><input type="checkbox" name="categories[]" value="b">
// <label><input type="checkbox" name="categories[]" value="c">


echo $binder->textarea("content");
// <textarea name="content"></content>
```

Bind post data
```php
$postdata = [
  "name" => "yamashita",
  "email" => "in.green.spot@gmail.com",
  "categories" => ["b", "c"]
];
$binder = new FormTagBinder\FormTagBinder($postdata);

echo $binder->text("name");
// <input type="text" name="name" value="yamashita">

echo $binder->email("email", ["required", "placeholder" => "info@example.com"]);
// <input type="email" name="email" value="in.green.spot@gmail.com" required placeholder="info@example.com">

foreach($binder->checkboxes(["a", "b", "c"], "categories") as $l => $cb){
  echo "<label>{$cb} {$l}</label>";
}
// <label><input type="checkbox" name="categories[]" value="a"> a</label>
// <label><input type="checkbox" name="categories[]" value="b" checked> b</label>
// <label><input type="checkbox" name="categories[]" value="c" checked> c</label>
```

## Methods

### input
- text($name, $props=[])
- email($name, $props=[])
- tel($name, $props=[])
- number($name, $props=[])
- color($name, $props=[])
- date($name, $props=[])
- datetime($name, $props=[])
- hidden($name, $props=[])
- month($name, $props=[])
- password($name, $props=[])
- range($name, $props=[])
- search($name, $props=[])
- time($name, $props=[])
- url($name, $props=[])
- week($name, $props=[])
- textarea($name, $props=[])

### selector
- select($dataset, $name, $props=[])
- radios($dataset, $name)
- checkboxes($dataset, $name)
