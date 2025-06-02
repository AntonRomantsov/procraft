<?php

require_once "soforp_view.php";
class NeoSeoWidgets extends SoforpWidgets
{
    private $allowed_options = NULL;
    private $old_module = false;
    public function __construct($nameSpace, $params)
    {
        parent::__construct($nameSpace, $params);
        $this->allowed_options = isset($params["allowed_options"]) ? $params["allowed_options"] : array();
        if (isset($params["old_module"])) {
            $this->old_module = $params["old_module"];
        }
    }
    public function dropdown($property, $options, $params = array())
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::dropdown($property, $options, $params);
    }
    public function dropdownLite($property, $options, $keys = array())
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::dropdownLite($property, $options, $keys);
    }
    public function dropdownLiteTemplate($property, $options, $keys = array())
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::dropdownLiteTemplate($property, $options, $keys);
    }
    public function dropdownB($property, $array, $options)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::dropdownB($property, $options, $options);
    }
    public function dropdownMultiStore($stores, $property, $options)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::dropdownMultiStore($stores, $property, $options);
    }
    public function dropdownA($property, $array, $index, $options)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::dropdownA($property, $array, $index, $options);
    }
    public function input($property)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::input($property);
    }
    public function inputRequired($property, $required = false, $error = "")
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::inputRequired($property, $required, $error);
    }
    public function dateInput($property, $required = false, $error = "")
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::dateInput($property, $required, $error);
    }
    public function inputLite($property, $keys = array())
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::inputLite($property, $keys);
    }
    public function inputMultiStore($stores, $property)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::inputMultiStore($stores, $property);
    }
    public function inputColor($property)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::inputColor($property);
    }
    public function inputGradientColor($property)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::inputGradientColor($property);
    }
    public function inputImage($property, $placeholder, $img)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::inputImage($property, $placeholder, $img);
    }
    public function inputA($property, $array, $index)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::inputA($property, $array, $index);
    }
    public function localeInput($property, $languages)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::localeInput($property, $languages);
    }
    public function localeInputRequired($property, $languages, $required = false, $error = "")
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::localeInputRequired($property, $languages, $required, $error);
    }
    public function localeInputLite($property, $languages, $keys = array())
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::localeInputLite($property, $languages, $keys);
    }
    public function localeInputMultiStore($stores, $property, $languages)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::localeInputMultiStore($stores, $property, $languages);
    }
    public function localeTextarea($property, $languages)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::localeTextarea($property, $languages);
    }
    public function password($property)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::password($property);
    }
    public function textarea($property, $rows = 6)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::textarea($property, $rows = 6);
    }
    public function textareaMultiStore($stores, $property, $rows = 6, $style = "")
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::textareaMultiStore($stores, $property, $rows = 6, $style = "");
    }
    public function textareaWideMultiStore($stores, $property, $rows = 6, $style = "")
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::textareaWideMultiStore($stores, $property, $rows = 6, $style = "");
    }
    public function textareaA($property, $array, $index, $rows = 6)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::textareaA($property, $array, $index, $rows = 6);
    }
    public function localeTextareaA($property, $array, $index, $languages, $rows = 6)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::localeTextareaA($property, $array, $index, $languages, $rows = 6);
    }
    public function text($property)
    {
        return parent::text($property);
    }
    public function textA($property, $array, $index)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::textA($property, $array, $index);
    }
    public function checklist($property, $options)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::checklist($property, $options);
    }
    public function checklistA($property, $array, $index, $options)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::checklistA($property, $array, $index, $options);
    }
    public function checklistMultiStore($stores, $property, $options)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::checklistMultiStore($stores, $property, $options);
    }
    public function checkbox($property)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::checkbox($property);
    }
    public function inputMultiStoreImageSize($stores, $property, $options)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array($property, $this->allowed_options)) {
            return $this->licenseProperty($property);
        }
        return parent::inputMultiStoreImageSize($stores, $property, $options);
    }
    public function watermarkMultiStore($stores)
    {
        if (!$this->old_module && isset($this->params["widget_hash"]) && $this->nameSpace != "" && is_array($this->allowed_options) && !in_array("neoseo_watermark_image", $this->allowed_options)) {
            return $this->licenseProperty("neoseo_watermark_image");
        }
        return parent::watermarkMultiStore($stores);
    }
    public function newWidgets($widget, $property, $options = array())
    {
        return parent::newWidgets($widget, $property, $options);
    }
    public function licenseField()
    {
        if ($this->old_module) {
            return parent::licenseField();
        }
        if (!isset($this->params["widget_hash"])) {
            $widget_data = array("work_mode" => 0, "est_days" => 0, "valid_to" => "01.01.1980", "error" => $this->params["text_license_error_key"]);
        } else {
            $widgets_hash = $this->params["widget_hash"];
            $widgets_hash = substr($widgets_hash, -5) . substr($widgets_hash, 0, -5);
            $widgets_hash = base64_decode($widgets_hash);
            $widget_data = @json_decode($widgets_hash, true);
        }
        if (0 < $widget_data["work_mode"] && (0 < $widget_data["est_days"] || $widget_data["est_days"] == $this->params["text_license_lifetime"]) && $widget_data["error"] == "") {
            echo "<div class=\"alert alert-success\">\n                 <i class=\"fa fa-exclamation-circle\"></i> " . $this->params["text_valid_to"] . " " . $widget_data["valid_to"] . "\n                 \t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n              </div>\n\t\t";
            echo "<div class=\"alert alert-success\">\n                 <i class=\"fa fa-exclamation-circle\"></i>" . $this->params["text_est_time"] . " " . $widget_data["est_days"] . "\n                     <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n                 </div>";
            echo "<div class=\"alert alert-success\">\n                 <i class=\"fa fa-check-circle\"></i>\n                    " . $this->params["text_mode"] . " " . $this->params["text_mode_" . $widget_data["work_mode"]] . "\n                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n               </div>";
        } else {
            echo "<div class=\"alert alert-danger\">\n            <i class=\"fa fa-exclamation-circle\"></i> " . $widget_data["error"] . " " . $this->params["text_mode_0"] . "\n            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n        </div>";
        }
        $this->textarea("module_key");
    }
    private function licenseProperty($property)
    {
        echo "        <div class=\"form-group\" id=\"field_";
        echo $property;
        echo "\" style=\"display: inline-block; width: 100%;\">\n            <div class=\"col-sm-5\">\n                <label class=\"control-label\"\n                       for=\"";
        echo $this->nameSpace . $property;
        echo "\">";
        echo $this->params["entry_" . $property];
        echo "</label>\n                <br>\n\t\t\t\t";
        if (isset($this->params["entry_" . $property . "_desc"])) {
            echo $this->params["entry_" . $property . "_desc"];
        }
        echo "            </div>\n            <div class=\"col-sm-7\"><div class=\"alert alert-danger\">\n                    <i class=\"fa fa-exclamation-circle\"></i> ";
        echo $this->params["text_not_included_in_license"];
        echo "                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n                </div>\n            </div>\n        </div>\n\t\t";
    }
}

?>