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
class bkManageTaiGameFormsAdmin extends BaseTaiGameForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arr_time = array_merge(array('' => '-- Chọn hệ điều hành --'), sfConfig::get('app_os_build'));
        $arr_2 = array_merge(array('' => '-- Hình thức tải --'), sfConfig::get('app_download_type'));
        $this->setWidgets(array(
            'OS' => new sfWidgetFormChoice(array('choices' => $arr_time), array('add_empty' => true)),
            'link_tai' => new sfWidgetFormTextarea(),
            'is_direct' => new sfWidgetFormChoice(array('choices' => $arr_2), array('add_empty' => true)),
            'count' => new sfWidgetFormInputText(),
//            'version' => new sfWidgetFormTextarea(),
            'platform_icon' => new sfWidgetFormTextarea(),
            'status'    => new sfWidgetFormInputCheckbox(),

        ));

        $this->setValidators(array(
            'OS' => new sfValidatorChoice(array('required' => true, 'choices' => array_keys($arr_time))),
            'is_direct' => new sfValidatorChoice(array('required' => true, 'choices' => array_keys($arr_2))),
            'link_tai' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
            'count' => new sfValidatorInteger(array('required' => false)),
//            'version' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
            'platform_icon' => new sfValidatorString(array('max_length' => 256, 'required' => false)),
            'status'    => new sfValidatorBoolean(array('required' => false)),
        ));
        $this->setWidget('file_down', new sfWidgetFormInputFileEditable(
            array('edit_mode' => !$this->isNew(),
                'with_delete' => false,
                'file_src' => $this->getObject()->getFileDown(),
            )
        ));

        $this->validatorSchema['file_down'] = new sfValidatorFileViettel(
            array('required' => false,
                'max_size' =>  200*1024*1024,
                'path' => sfConfig::get('app_upload_file') .  '/files',
                'extensions'=>array('apk', 'ipa', 'exe'),
//                'mime_types' => array('application/x-rar','application/rar','application/x-rar-compressed',
//                    'application/octet-stream', 'application/zip', 'application/x-zip','application/x-zip-compressed')
            ),
            array('max_size' => $i18n->__('File upload dung lượng không quá 20M.'),
                'extensions' => $i18n->__('Chỉ được upload các file có định dạng .apk, .ipa, .exe'),
//                'mime_types' => $i18n->__('Chỉ được upload các file có định dạng .zip, .rar')
            ));

        $this->widgetSchema->setNameFormat('tai_game[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}
