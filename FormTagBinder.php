<?php

namespace FormTagBinder;

class FormTagBinder {
  private $data;

  public function __construct($data=[]){
    $this->data = $data;
  }

  private function el($key, $default=null){
    return isset($this->data[$key]) ? $this->data[$key] : $default;
  }

  public function input($type, $name, $props=[]){
    $val = htmlspecialchars($this->el($name, ""));
    $props_string = $this->propsString($props);

    return "<input type=\"{$type}\" name=\"{$name}\" value=\"{$val}\"{$props_string}>";
  }

  public function text($name, $props=[]){
    return $this->input("text", $name, $props);
  }

  public function email($name, $props=[]){
    return $this->input("email", $name, $props);
  }

  public function tel($name, $props=[]){
    return $this->input("tel", $name, $props);
  }

  public function number($name, $props=[]){
    return $this->input("number", $name, $props);
  }

  public function color($name, $props=[]){
    return $this->input("color", $name, $props);
  }

  public function date($name, $props=[]){
    return $this->input("date", $name, $props);
  }

  public function datetime($name, $props=[]){
    return $this->input("datetime-local", $name, $props);
  }

  public function hidden($name, $props=[]){
    return $this->input("hidden", $name, $props);
  }

  public function month($name, $props=[]){
    return $this->input("month", $name, $props);
  }

  public function password($name, $props=[]){
    return $this->input("password", $name, $props);
  }

  public function range($name, $props=[]){
    return $this->input("range", $name, $props);
  }

  public function search($name, $props=[]){
    return $this->input("search", $name, $props);
  }

  public function time($name, $props=[]){
    return $this->input("time", $name, $props);
  }

  public function url($name, $props=[]){
    return $this->input("url", $name, $props);
  }

  public function week($name, $props=[]){
    return $this->input("week", $name, $props);
  }

  public function textarea($name, $props=[]){
    $val = htmlspecialchars($this->el($name, ""));
    $props_string = $this->propsString($props);

    return "<textarea name=\"{$name}\"{$props_string}>{$val}</textarea>";
  }

  public function select($dataset, $name, $props=[]){
    $val = $this->el($name, "");
    $props_string = $this->propsString($props);

    $options = implode("", array_map(function($label, $v)use($val){
      if(is_int($label)) $label = $v;
      $selected = $v === $val ? " selected" : "";
      return "<option value=\"{$v}\"{$selected}>{$label}</option>";
    }, array_keys($dataset), array_values($dataset)));

    return "<select name=\"{$name}\"{$props_string}>{$options}</select>";
  }

  public function radios($dataset, $name){
    $first_option_key = array_keys($dataset)[0];
    if (is_int($first_option_key)) $first_option_key = array_values($dataset)[0];
    $val = $this->el($name, $first_option_key);

    $ret = [];

    foreach($dataset as $label => $v){
      $v = htmlspecialchars($v);
      if(is_int($label)) $label = $v;
      $checked = $v === $val ? " checked" : "";

      $ret[$label] = "<input type=\"radio\" name=\"{$name}\" value=\"{$v}\"{$checked}>";
    }

    return $ret;
  }

  public function checkboxes($dataset, $name){
    $vals = $this->el($name, []);

    $ret = [];

    foreach($dataset as $label => $v){
      $v = htmlspecialchars($v);
      if(is_int($label)) $label = $v;
      $checked = in_array($v, $vals) ? " checked" : "";

      $ret[$label] = "<input type=\"checkbox\" name=\"{$name}[]\" value=\"{$v}\"{$checked}>";
    }

    return $ret;
  }

  public function propsString($props){
    return " " . implode(" ", array_map(function($key, $val){
      return is_int($key) ? $val : "{$key}=\"{$val}\"";
    }, array_keys($props), array_values($props)));
  }
}
