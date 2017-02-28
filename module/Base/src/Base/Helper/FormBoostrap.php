<?php

namespace Base\Helper;

use Zend\Form\View\Helper\AbstractHelper;
use Zend\Form\Form;

class FormBoostrap extends AbstractHelper {

    public function __invoke(Form $form, Array $remove = null) {
        $this->validTagAttributes = array_merge(
                $this->validTagAttributes, array(
            "ng-show" => true,
            "ng-animate" => true,
            "class" => true
                )
        );



        $html = $this->render($form, $remove);
        return $html;
    }

    public function renderElement(\Zend\Form\Element $element, Array $remove = null) {

        $html = '';
        if (!$element instanceof \Zend\Form\Element\Button) {
            if (!$element instanceof \Zend\Form\Element\File) {
                $html = '<div ';
                $attributes = (array) $element->getOption('wrapper-attributes');

                $attributes['class'] = (isset($attributes['class']) ? $attributes['class'] : '') . ' form-group';
                $html .= $this->createAttributesString($attributes);


                $html .='>';
                $html .= '<label for="' . $element->getName() . '" class="col-sm-2 control-label">'
                        . $element->getLabel()
                        . '</label>';
                if ($element->getOption('append')) {
                    $html .= '<div class="col-sm-8">';
                } else {
                    $html .= '<div class="col-sm-10">';
                }
                $html.= $this->getView()->formElement($element);
                $html .= '</div>';
                if ($element->getOption('append')) {
                    $html.= '<div class="col-sm-2">'
                            . $element->getOption('append')
                            . '</div>';
                }
                $html .= '</div>';
                $html = '<div ';
                $attributes = (array) $element->getOption('wrapper-attributes');

                $attributes['class'] = (isset($attributes['class']) ? $attributes['class'] : '') . ' form-group';
                $html .= $this->createAttributesString($attributes);


                $html .='>';
                $html .= '<label for="' . $element->getName() . '" class="control-label">'
                        . $element->getLabel()
                        . '</label>';
                $html.= $this->getView()->formElement($element);
                
                if ($element->getMessages()) {
                    foreach ($element->getMessages() as $messagem) {
                        $html .= '<span class="help-block">' . $messagem . '</span>';
                    }
                }
                $html .= '</div>';

                if (isset($remove)) {
                    foreach ($remove as $key) {
                        if ($key == $element->getName()) {
                            $html = '';
                        }
                    }
                }

                return $html;
            } else {
                return $this->renderElementFile($element);
            }
        }
    }

    public function renderElementFile(\Zend\Form\Element $element, Array $remove = null) {
        $html = '<div ';
            $attributes = (array) $element->getOption('wrapper-attributes');
            $attributes['class'] = (isset($attributes['class']) ? $attributes['class'] : '') . ' form-group';
            $html .= $this->createAttributesString($attributes);
        $html .='>';
        
        $html .= '<label for="' . $element->getName() . '" class="col-sm-2 control-label">'
                . $element->getLabel()
                . '</label>';
        if ($element->getOption('append')) {
            $html .= '<div class="col-sm-8">';
        } else {
            $html .= '<div class="col-sm-10">';
        }
        $html.= $this->getView()->formElement($element);
        
        
        $html .= '</div>';
        if ($element->getOption('append')) {
            $html.= '<div class="col-sm-2">'
                    . $element->getOption('append')
                    . '</div>';
        }
        $html .= '</div>';
        $html = '<div ';
        $attributes = (array) $element->getOption('wrapper-attributes');

        $attributes['class'] = (isset($attributes['class']) ? $attributes['class'] : '') . ' form-group';
        $html .= $this->createAttributesString($attributes);


        $html .='>';
        $html .= '<label for="' . $element->getName() . '" class="control-label">'
                . $element->getLabel()
                . '</label>';
        $html.= $this->getView()->formElement($element);
        $html.= '<div class="input-group">';
        $html.= '<span class="input-group-addon"> <i class="fa fa-envelope"> Upload </i></span>';
        $html.= '<input class="form-control input-lg" type="text" id="imagem_text_'.$element->getName().'" value="'. $element->getValue() .'" />';
        $html.= '</div>';
        if ($element->getMessages()) {
            foreach ($element->getMessages() as $messagem) {
                $html .= '<span class="help-block">' . $messagem . '</span>';
            }
        }
        $html .= '</div>';
        
        return $html;
    }

    public function renderElementButton(\Zend\Form\Element $element, Array $remove = null) {
        $html = '';
        if (!$element instanceof \Zend\Form\Element\Button) {
            return False;
        } elseif ($element instanceof \Zend\Form\Element\Button) {
            $html.= $this->getView()->formElement($element);
        }
        return $html;
    }

    public function render($elements, Array $remove = null) {
        $html = '';
        $html.= '<div class="box-body">';
        foreach ($elements as $element) {
            if ($element instanceof \Zend\Form\Fieldset) {
                $html.= '<fieldset>';
                if ($element->getLabel() != '') {
                    $html.= '<legend>' . $element->getLabel() . '</legend>';
                }
                if ($element->getMessages()) {
                    foreach ($element->getElements() as $elementfs) {
                        foreach ($elementfs->getMessages() as $msg) {
                            $html .= '<div class="alert alert-danger alert-dismissable">'
                                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                            $html .= "<b>[{$elementfs->getLabel()}]</b> " . $msg;
                            $html .= '</div>';
                        }
                    }
                }
                if ($element instanceof \Zend\Form\Element\Collection && $element->shouldCreateTemplate()) {
                    $html.= "<fieldset>" .
                            $this->render($element) .
                            "</fieldset>";
                    $escapeHtmlAttribHelper = $this->getView()->plugin('escapehtmlattr');
                    if ($element->getTemplateElement() instanceof \Zend\Form\Fieldset) {
                        $templateMarkup = $this->render($element->getTemplateElement());
                    } else {
                        $templateMarkup = $this->renderElement($element->getTemplateElement());
                    }
                    $template = "<fieldset>" .
                            $templateMarkup
                            . "<hr/></fieldset>"
                    ;
                    $html .= sprintf(
                            '<span class="template" data-template="%s"></span>', $escapeHtmlAttribHelper($template)
                    );
                    if (!is_null($element->getOption('add_button'))) {
                        $buttonRender = $this->getView()->plugin('formButton');
                        $botao = $element->getOption('add_button');
                        if (!$botao instanceof \Zend\Form\Element\Button) {
                            $factory = new \Zend\Form\Factory();
                            $botao = $factory->createElement($botao);
                        }
                        $html .= '<div class="col-sm-2"></div><div class="col-sm-3">';
                        $html .= $buttonRender($botao);
                        $html .= '</div>';
                    }
                    if (!is_null($element->getOption('remove_button'))) {
                        $buttonRender = $this->getView()->plugin('formButton');
                        $botao = $element->getOption('remove_button');
                        if (!$botao instanceof \Zend\Form\Element\Button) {
                            $factory = new \Zend\Form\Factory();
                            $botao = $factory->createElement($botao);
                        }
                        $html .= '<div class="col-sm-3">';
                        $html .= $buttonRender($botao);
                        $html .= '</div>';
                    }
                } else {
                    $html.= $this->render($element);
                }
                $html.= '<hr/></fieldset>';
            } else {

                $html.= $this->renderElement($element, $remove);
            }
        }
        $html.= '</div class>';
        $html.= '<div class="box-footer">';
        foreach ($elements as $element) {
            if ($this->renderElementButton($element) <> false) {
                $html.= $this->renderElementButton($element);
            };
        }
        $html.= '</div class>';
        return $html;
    }

}