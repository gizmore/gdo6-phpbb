<?php
namespace GDO\PHPBB\Method;

use GDO\Core\MethodAdmin;
use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Form\GDT_Submit;
use GDO\Form\GDT_AntiCSRF;

final class PostInstall extends MethodForm
{
    use MethodAdmin;
    
    public function execute()
    {
        return $this->renderNavBar()->add(parent::execute());
    }
    
    public function createForm(GDT_Form $form)
    {
        $form->addFields(array(
            GDT_Submit::make(),
            GDT_AntiCSRF::make(),
        ));
    }

    public function formValidated(GDT_Form $form)
    {
        return $this->message('msg_phpbb_hacked');
    }
    
}
