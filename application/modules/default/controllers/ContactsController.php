<?php

class ContactsController extends Bones_Controller_Default
{

    public function init() {
        parent::init();
        $this->set_meta_description("Feel free to contact us using the email addresses below, or find our profiles on the most important social networks!");
        $this->setup_sidebar(array(self::BAR_FACEBOOK =>'', self::BAR_NEWS => 5, self::BAR_SHOWS => 3, self::BAR_TWITTER =>''));
    }

    public function indexAction()
    {
        // action body
    }

    public function sendAction() {
        $valid = false;
        $post_data = $this->getRequest()->getPost();
        $email_validator  = new Zend_Validate_EmailAddress();
        if ($email_validator->isValid(@$post_data['sender_email'])) {
            $mail = new Zend_Mail();
            $mail->setSubject(@$post_data['mail_subject']);
            $mail->setBodyText(@$post_data['message']);
            $mail->setFrom(@$post_data['sender_email']);
            $mail->addTo("bonesrock+from_site@gmail.com");
            try {
            $mail->send();
            $valid = true;
            } catch (Exception $e) {
                $valid = true;
            }
        }
        $this->view->is_valid = $valid;
    }
}

