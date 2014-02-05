<?php

if (!defined('BASEURL')) {
    exit('No direct calls allowed!');
}

// KatiePHP Email class
// Start of EmailLib.php (KatiePHP) /system/libraries
/* * ************************************************************************ */
Class EmailLib {

    protected $emailData = array();

    /*
     * public function sendEmail
     * send email
     *  parameters:
     *      @mailTo : string expected (optional)
     *      @mailFrom : string expected (optional)  
     *      @mailReplyTo : string expected (optional)  
     *      @mailSubject : string expected (optional)  
     *      @mailMessage : string expected (optional)  
     */

    public function sendEmail($mailTo = '', $mailFrom = '', $mailReplyTo = '', $mailSubject = '', $mailMessage = '') {
        if ($mailTo) {
            $this->setTo($mailTo);
        }
        if ($mailFrom) {
            $this->setFrom($mailFrom);
        }
        if ($mailReplyTo) {
            $this->setReplyTo($mailReplyTo);
        }
        if ($mailSubject) {
            $this->setSubject($mailSubject);
        }
        if ($mailMessage) {
            $this->setMessage($mailMessage);
        }
        $mailTo = $this->emailData['to'];
        $mailSubject = $this->emailData['subject'];
        $mailMessage = $this->emailData['message'];
        $mailHeaders = 'From: ' . $this->emailData['from'] . "\r\n";
        $mailHeaders .= 'Reply-To: ' . $this->emailData['replyto'] . "\r\n";
        $mailHeaders .= "MIME-Version: 1.0\r\n";
        $mailHeaders .= "Content-Type: text/html; charset=utf-8\r\n";

        return mail($mailTo, $mailSubject, $mailMessage, $mailHeaders);
    }

    /*
     * public function setTo
     *  parameters:
     *      @mailTo : string expected (optional) 
     */

    public function setTo($mailTo) {
        $this->emailData['to'] = $mailTo;
    }

    /*
     * public function setFrom
     *  parameters:
     *      @mailFrom : string expected (optional) 
     */

    public function setFrom($mailFrom) {
        $this->emailData['from'] = $mailFrom;
    }

    /*
     * public function setReplyTo
     *  parameters:
     *      @mailReplyTo : string expected (optional) 
     */

    public function setReplyTo($mailReplyTo) {
        $this->emailData['replyto'] = $mailReplyTo;
    }

    /*
     * public function setSubject
     *  parameters:
     *      @mailSubject : string expected (optional) 
     */

    public function setSubject($mailSubject) {
        $this->emailData['subject'] = $mailSubject;
    }

    /*
     * public function setMessage
     *  parameters:
     *      @mailMessage : string expected (optional) 
     */

    public function setMessage($mailMessage) {
        $this->emailData['message'] = $mailMessage;
    }

    /*
     * public function clearData
     * clear email data
     */

    public function clearData() {
        $this->emailData = array();
    }

}

// End of the file EmailLib.php