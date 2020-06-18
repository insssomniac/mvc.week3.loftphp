<?php
namespace Base;

class View
{
    private $templatePath;
    private $data;
    private $twig;

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
        var_dump($templateData);
        foreach ($templateData as $key => $value) {
            $this->data[$key] = $value;
        }
        ob_start();
        include $this->templatePath . '/' . $tpl;
        $templateData = ob_get_clean();
        return $templateData;
    }

    public function renderTwig(string $tpl, $templateData = [])
    {
        if (!$this->twig) {
            $twigLoader = new \Twig\Loader\FilesystemLoader($this->templatePath);
            $this->twig = new \Twig\Environment($twigLoader);
        }

        return $this->twig->render($tpl, $templateData);
    }
}