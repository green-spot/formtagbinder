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

---
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
// <label><input type="checkbox" name="categories[]" value="a">
// <label><input type="checkbox" name="categories[]" value="b" checked>
// <label><input type="checkbox" name="categories[]" value="c" checked>
```
