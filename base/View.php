<?php
namespace Base;

class View
{
    private $templatePath;
    private $data;

    public function __construct()
    {
    }

    public function setTemplatePath(string $path)
    {
        $this->templatePath = $path;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function render(string $tpl, $templateData = []): string
    {
        foreach ($templateData as $key => $value) {
            $this->data[$key] = $value;
        }
        ob_start();
        include $this->templatePath . '/' . $tpl;
        $templateData = ob_get_clean();
        return $templateData;
    }
}