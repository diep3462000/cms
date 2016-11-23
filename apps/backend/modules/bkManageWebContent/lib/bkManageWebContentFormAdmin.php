<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vtManageChargAmountFormAdmin
 *
 * @author diepth2
 */
class bkManageWebContentFormAdmin extends BaseWebContentForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_type = array(0 =>$i18n->__("Tin Tức"), 2 => $i18n->__("Giới Thiệu"), 3 => $i18n->__("Hỗ trợ"));
        $this->setWidgets(array(
            'content'    => new sfWidgetFormCKEditor(
                array(
                    'jsoptions' => array('toolbar' => 'Basic',
                        'width' => '700',
                        'height' => '200'),
                )),
            'title'       => new sfWidgetFormTextarea(),
            'type' => new sfWidgetFormChoice(array('choices' => $arr_type), array('add_empty' => true)),
//            'type'        => new sfWidgetFormInputText(),
            'keywords'    => new sfWidgetFormTextarea(),
            'description' => new sfWidgetFormTextarea(),
            'status'    => new sfWidgetFormInputCheckbox(),
            'is_hot'    => new sfWidgetFormInputCheckbox(),
            'image' => new sfWidgetFormInputFileEditable(array(
                'label' => 'Ảnh',
                'file_src' => VtHelper::getUrlImagePathThumb(sfConfig::get('app_category_images'), $this->getObject()->getImage()),
                'is_image' => true,
                'edit_mode' => !$this->isNew(),
                'template' => '<div>%file%<br />%input%</div>')
            )
            )
        )
        ;

        $this->setValidators(array(
            'content'   => new sfValidatorString(array('max_length' => 40000, 'required' => false)),
            'title'       => new sfValidatorString(array('max_length' => 512, 'required' => false)),
            'type' => new sfValidatorChoice(array('required' => false, 'choices' => array_keys($arr_type))),
//            'type'        => new sfValidatorInteger(array('required' => false)),
            'keywords'    => new sfValidatorString(array('max_length' => 256, 'required' => false)),
            'description' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
            'status'    => new sfValidatorInteger(array('required' => false)),
            'is_hot'    => new sfValidatorInteger(array('required' => false)),
            'image' =>new sfValidatorFileViettel(
                array(
                    'validated_file_class' => 'sfResizeMediumThumbnailImage',
                    'max_size' => sfConfig::get('app_image_maxsize', 5242880),
                    'mime_types' => array('image/jpeg','image/jpg', 'image/png', 'image/gif'),
                    'path' => sfConfig::get("sf_upload_dir") . '/' . sfConfig::get('app_category_images'),
                    'required' => false
                ),
                array(
                    'mime_types' =>  $i18n->__('Dữ liệu không hợp lệ hoặc định dạng không đúng.'),
                    'max_size' =>  $i18n->__('Tối đa 5MB')
                )
            )
        ));

//        $this->widgetSchema['status']->setOption('value_attribute_value', 1);

//        $this->widgetSchema['status']->setDefault('value_attribute_value', 0);
//        $this->widgetSchema['is_hot']->setDefault('value_attribute_value', 0);

//        $this->widgetSchema['is_hot']->setOption('value_attribute_value', 1);

        $this->widgetSchema->setNameFormat('web_content[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}
