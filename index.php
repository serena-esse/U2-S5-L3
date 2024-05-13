<?php

class FormCreator {
    private $action;
    private $method;
    private $fields;

    public function __construct($action, $method = "POST") {
        $this->action = $action;
        $this->method = $method;
        $this->fields = array();
    }

    public function addField($type, $name, $label, $attributes = array()) {
        $this->fields[] = array(
            'type' => $type,
            'name' => $name,
            'label' => $label,
            'attributes' => $attributes
        );
    }

    public function getForm() {
        $form = "<form action='{$this->action}' method='{$this->method}'>";
        foreach ($this->fields as $field) {
            $form .= "<div>";
            $form .= "<label for='{$field['name']}'>{$field['label']}</label>";
            $form .= "<input type='{$field['type']}' name='{$field['name']}' ";
            foreach ($field['attributes'] as $attr => $value) {
                $form .= "$attr='$value' ";
            }
            $form .= "></div>";
        }
        $form .= "<button type='submit'>Submit</button>";
        $form .= "</form>";
        return $form;
    }
}

// Esempio di utilizzo:
$form = new FormCreator("process_form.php", "POST");
$form->addField("text", "username", "Username");
$form->addField("password", "password", "Password");
$form->addField("submit", "submit", "", array("value" => "Invia"));
echo $form->getForm();

?>
