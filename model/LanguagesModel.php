<?php
class LanguagesModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_LANGUAGE;
        
		$this->conectar = null;
		$this->db = $adapter;
    }
    
    public function getConetar(){
        return $this->conectar;
    }
    
    public function db(){
        return $this->db;
    }
////////////////////////////////////////////

    public $idLanguage = "0";
    public $vLanguage = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idLanguage = $this->idLanguage");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_info_menu(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "title"=>TITLE_INFO_ESP,
                "search"=>SEARCH_MENU_ESP,
                "sign_in"=>SIGN_IN_MENU_ESP,
                "cart"=>CART_MENU_ESP,
                "main"=>MAIN_MENU_ESP,
                "designer"=>DESIGNER_MENU_ESP,
                "catalog"=>CATALOG_MENU_ESP,
                "coming_soon"=>WAITING_LIST_MENU_ESP,
                "schedule"=>SCHEDULE_MENU_ESP,
                "size"=>SIZE_MENU_ESP,
                "color"=>COLOR_MENU_ESP,
                "pieces"=>PIECES_MENU_ESP,
                "contact"=>CONTACT_MENU_ESP,
                "follow"=>FOLLOW_FOOTER_ESP,
                "cookies_message_1"=>COOKIES_MESSAGE_1_ESP,
                "cookies_message_2"=>COOKIES_MESSAGE_2_ESP,
                "cookies_message_3"=>COOKIES_MESSAGE_3_ESP,
                "cookies_message_4"=>COOKIES_MESSAGE_4_ESP,
                "privacy"=>PRIVACY_ESP,
                "cookies"=>COOKIES_ESP
            );
        }
        else{
            $info=array(
                "title"=>TITLE_INFO_ENG,
                "search"=>SEARCH_MENU_ENG,
                "sign_in"=>SIGN_IN_MENU_ENG,
                "cart"=>CART_MENU_ENG,
                "main"=>MAIN_MENU_ENG,
                "designer"=>DESIGNER_MENU_ENG,
                "catalog"=>CATALOG_MENU_ENG,
                "coming_soon"=>WAITING_LIST_MENU_ENG,
                "schedule"=>SCHEDULE_MENU_ENG,
                "size"=>SIZE_MENU_ENG,
                "color"=>COLOR_MENU_ENG,
                "pieces"=>PIECES_MENU_ENG,
                "contact"=>CONTACT_MENU_ENG,
                "follow"=>FOLLOW_FOOTER_ENG,
                "cookies_message_1"=>COOKIES_MESSAGE_1_ENG,
                "cookies_message_2"=>COOKIES_MESSAGE_2_ENG,
                "cookies_message_3"=>COOKIES_MESSAGE_3_ENG,
                "cookies_message_4"=>COOKIES_MESSAGE_4_ENG,
                "privacy"=>PRIVACY_ENG,
                "cookies"=>COOKIES_ENG
            );
        }
        
        return $info;
    }

    public function get_info_car(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "title"=>CAR_TITLE_ESP,
                "shipping"=>CAR_SHIPPING_ESP,
                "pay"=>CAR_PAY_ESP
            );
        }
        else{
            $info=array(
                "title"=>CAR_TITLE_ENG,
                "shipping"=>CAR_SHIPPING_ENG,
                "pay"=>CAR_PAY_ENG
            );
        }
        
        return $info;
    }

    public function get_info_main(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_MAIN_ESP,
                "seccion2_title"=>SECCION2_TITLE_MAIN_ESP,
                "seccion2_subtitle"=>SECCION2_SUBTITLE_MAIN_ESP,
                "seccion2_text"=>SECCION2_TEXT_MAIN_ESP,
                "seccion2_button"=>SECCION2_BUTTON_MAIN_ESP,
                "seccion3_title"=>SECCION3_TITLE_MAIN_ESP,
                "seccion4_title"=>SECCION4_TITLE_MAIN_ESP,
                "seccion4_subtitle"=>SECCION4_SUBTITLE_MAIN_ESP,
                "seccion4_text"=>SECCION4_TEXT_MAIN_ESP,
                "seccion4_button"=>SECCION4_BUTTON_MAIN_ESP,
                "seccion5_title"=>SECCION5_TITLE_MAIN_ESP
            );
        }
        else{
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_MAIN_ENG,
                "seccion2_title"=>SECCION2_TITLE_MAIN_ENG,
                "seccion2_subtitle"=>SECCION2_SUBTITLE_MAIN_ENG,
                "seccion2_text"=>SECCION2_TEXT_MAIN_ENG,
                "seccion2_button"=>SECCION2_BUTTON_MAIN_ENG,
                "seccion3_title"=>SECCION3_TITLE_MAIN_ENG,
                "seccion4_title"=>SECCION4_TITLE_MAIN_ENG,
                "seccion4_subtitle"=>SECCION4_SUBTITLE_MAIN_ENG,
                "seccion4_text"=>SECCION4_TEXT_MAIN_ENG,
                "seccion4_button"=>SECCION4_BUTTON_MAIN_ENG,
                "seccion5_title"=>SECCION5_TITLE_MAIN_ENG
            );
        }
        
        return $info;
    }

    public function get_info_catalog(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "filter"=>CATALOG_FILTER_ESP,
                "add_cart"=>CATALOG_ADD_CART_ESP,
                "size"=>CATALOG_SIZE_ESP,
                "color"=>CATALOG_COLOR_ESP,
                "pieces"=>CATALOG_PIECES_ESP,
                "type"=>CATALOG_TYPE_ESP,
                "branch"=>CATALOG_BRANCH_ESP,
                "price"=>CATALOG_PRICE_ESP
            );
        }
        else{
            $info=array(
                "filter"=>CATALOG_FILTER_ENG,
                "add_cart"=>CATALOG_ADD_CART_ENG,
                "size"=>CATALOG_SIZE_ENG,
                "color"=>CATALOG_COLOR_ENG,
                "pieces"=>CATALOG_PIECES_ENG,
                "type"=>CATALOG_TYPE_ENG,
                "branch"=>CATALOG_BRANCH_ENG,
                "price"=>CATALOG_PRICE_ENG
            );
        }
        
        return $info;
    }

    public function get_info_search(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "filter"=>SEARCH_FILTER_ESP,
                "sale"=>SEARCH_SALE_ESP,
                "rent"=>SEARCH_RENT_ESP
            );
        }
        else{
            $info=array(
                "filter"=>SEARCH_FILTER_ENG,
                "sale"=>SEARCH_SALE_ENG,
                "rent"=>SEARCH_RENT_ENG
            );
        }
        
        return $info;
    }

    public function get_info_contact(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_CONTACT_ESP,
                "seccion1_subtitle"=>SECCION1_SUBTITLE_CONTACT_ESP,
                "seccion2_title"=>SECCION2_TITLE_CONTACT_ESP,
                "seccion3_title"=>SECCION3_TITLE_CONTACT_ESP,
                "seccion3_email"=>SECCION3_EMAIL_CONTACT_ESP,
                "seccion3_message"=>SECCION3_MESSAGE_CONTACT_ESP,
                "seccion3_send"=>SECCION3_SEND_CONTACT_ESP
            );
        }
        else{
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_CONTACT_ENG,
                "seccion1_subtitle"=>SECCION1_SUBTITLE_CONTACT_ENG,
                "seccion2_title"=>SECCION2_TITLE_CONTACT_ENG,
                "seccion3_title"=>SECCION3_TITLE_CONTACT_ENG,
                "seccion3_email"=>SECCION3_EMAIL_CONTACT_ENG,
                "seccion3_message"=>SECCION3_MESSAGE_CONTACT_ENG,
                "seccion3_send"=>SECCION3_SEND_CONTACT_ENG
            );
        }
        
        return $info;
    }

    public function get_info_account(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_ACCOUNT_ESP,
                "seccion1_subtitle"=>SECCION1_SUBTITLE_ACCOUNT_ESP,
                "seccion1_name"=>SECCION1_NAME_ACCOUNT_ESP,
                "seccion1_email"=>SECCION1_EMAIL_ACCOUNT_ESP,
                "seccion1_password"=>SECCION1_PASSWORD_ACCOUNT_ESP,
                "seccion1_confirm_password"=>SECCION1_CONFIRM_PASSWORD_ACCOUNT_ESP,
                "seccion1_min_password"=>SECCION1_MIN_PASSWORD_ACCOUNT_ESP,
                "seccion1_phone"=>SECCION1_PHONE_ACCOUNT_ESP,
                "seccion1_address"=>SECCION1_ADDRESS_ACCOUNT_ESP,
                "seccion1_cp"=>SECCION1_CP_ACCOUNT_ESP,
                "seccion1_error"=>SECCION1_ERROR_ACCOUNT_ESP,
                "seccion1_user_not_valid"=>SECCION1_USER_NOT_VALID_ACCOUNT_ESP,
                "seccion1_button"=>SECCION1_BUTTON_ACCOUNT_ESP
            );
        }
        else{
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_ACCOUNT_ENG,
                "seccion1_subtitle"=>SECCION1_SUBTITLE_ACCOUNT_ENG,
                "seccion1_name"=>SECCION1_NAME_ACCOUNT_ENG,
                "seccion1_email"=>SECCION1_EMAIL_ACCOUNT_ENG,
                "seccion1_password"=>SECCION1_PASSWORD_ACCOUNT_ENG,
                "seccion1_confirm_password"=>SECCION1_CONFIRM_PASSWORD_ACCOUNT_ENG,
                "seccion1_min_password"=>SECCION1_MIN_PASSWORD_ACCOUNT_ENG,
                "seccion1_phone"=>SECCION1_PHONE_ACCOUNT_ENG,
                "seccion1_address"=>SECCION1_ADDRESS_ACCOUNT_ENG,
                "seccion1_cp"=>SECCION1_CP_ACCOUNT_ENG,
                "seccion1_error"=>SECCION1_ERROR_ACCOUNT_ENG,
                "seccion1_user_not_valid"=>SECCION1_USER_NOT_VALID_ACCOUNT_ENG,
                "seccion1_button"=>SECCION1_BUTTON_ACCOUNT_ENG
            );
        }
        
        return $info;
    }

    public function get_info_thankyouContact(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_TANKYOUCONTACT_ESP,
                "seccion1_subtitle"=>SECCION1_SUBTITLE_TANKYOUCONTACT_ESP,
                "seccion1_button"=>SECCION1_BUTTON_TANKYOUCONTACT_ESP
            );
        }
        else{
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_TANKYOUCONTACT_ENG,
                "seccion1_subtitle"=>SECCION1_SUBTITLE_TANKYOUCONTACT_ENG,
                "seccion1_button"=>SECCION1_BUTTON_TANKYOUCONTACT_ENG
            );
        }
        
        return $info;
    }

    public function get_info_login(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_LOGIN_ESP,
                "seccion1_email"=>SECCION1_EMAIL_LOGIN_ESP,
                "seccion1_password"=>SECCION1_PASSWORD_LOGIN_ESP,
                "seccion1_error"=>SECCION1_ERROR_LOGIN_ESP,
                "seccion1_user_not_valid"=>SECCION1_USER_NOT_VALID_LOGIN_ESP,
                "seccion1_button"=>SECCION1_BUTTON_LOGIN_ESP,
                "seccion1_no_account"=>SECCION1_NO_ACCOUNT_LOGIN_ESP
            );
        }
        else{
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_LOGIN_ENG,
                "seccion1_email"=>SECCION1_EMAIL_LOGIN_ENG,
                "seccion1_password"=>SECCION1_PASSWORD_LOGIN_ENG,
                "seccion1_error"=>SECCION1_ERROR_LOGIN_ENG,
                "seccion1_user_not_valid"=>SECCION1_USER_NOT_VALID_LOGIN_ENG,
                "seccion1_button"=>SECCION1_BUTTON_LOGIN_ENG,
                "seccion1_no_account"=>SECCION1_NO_ACCOUNT_LOGIN_ENG
            );
        }
        
        return $info;
    }

    public function get_info_schedule(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_SCHEDULE_ESP,
                "seccion1_name"=>SECCION1_NAME_SCHEDULE_ESP,
                "seccion1_phone"=>SECCION1_PHONE_SCHEDULE_ESP,
                "seccion1_branch"=>SECCION1_BRANCH_SCHEDULE_ESP,
                "seccion1_address_proof"=>SECCION1_ADDRESS_PROOF_SCHEDULE_ESP,
                "seccion1_type_schedule"=>SECCION1_TYPE_SCHEDULE_SCHEDULE_ESP,
                "seccion1_text_type_schedule"=>SECCION1_TEXT_TYPE_SCHEDULE_SCHEDULE_ESP,
                "seccion1_text_rent_type_schedule"=>SECCION1_TEXT_RENT_TYPE_SCHEDULE_SCHEDULE_ESP,
                "seccion1_text_sale_type_schedule"=>SECCION1_TEXT_SALE_TYPE_SCHEDULE_SCHEDULE_ESP,
                "seccion1_text_making_type_schedule"=>SECCION1_TEXT_MAKING_TYPE_SCHEDULE_SCHEDULE_ESP,
                "seccion1_event_date"=>SECCION1_EVENT_DATE_SCHEDULE_ESP,
                "seccion1_hour"=>SECCION1_HOUR_SCHEDULE_ESP,
                "seccion1_model"=>SECCION1_MODEL_SCHEDULE_ESP,
                "seccion1_text_select_model"=>SECCION1_TEXT_SELECT_MODEL_SCHEDULE_ESP,
                "seccion1_text_hour"=>SECCION1_TEXT_HOUR_SCHEDULE_ESP,
                "seccion1_check_event"=>SECCION1_CHECK_EVENT_SCHEDULE_ESP,
                "seccion1_color"=>SECCION1_COLOR_SCHEDULE_ESP,
                "seccion1_size"=>SECCION1_SIZE_SCHEDULE_ESP,
                "seccion1_text_size"=>SECCION1_TEXT_SIZE_SCHEDULE_ESP,
                "seccion1_text_color"=>SECCION1_TEXT_COLOR_SCHEDULE_ESP,
                "seccion1_age"=>SECCION1_AGE_SCHEDULE_ESP,
                "seccion1_price_range"=>SECCION1_PRICE_RANGE_SCHEDULE_ESP,
                "seccion1_error"=>SECCION1_ERROR_ACCOUNT_ESP,
                "seccion1_button"=>SECCION1_BUTTON_SCHEDULE_ESP,
                "seccion1_message"=>SECCION1_MESSAGE_SCHEDULE_ESP,
                "seccion1_date_delivery"=>SECCION1_DATE_DELIVERY_SCHEDULE_ESP,
                "seccion1_text_select_branch"=>SECCION1_TEXT_SELECT_BRANCH_SCHEDULE_ESP,
                "seccion1_message_doubts" =>SECCION1_MESSAGE_DOUBTS_SCHEDULE_ESP,
                "seccion1_ine" =>SECCION1_INE_SCHEDULE_ESP,
                "seccion1_advance" =>SECCION1_ADVANCE_SCHEDULE_ESP,
                "seccion1_not_available" =>SECCION1_MESSAGE_NOT_AVAILABLE_SCHEDULE_ESP,
                "seccion1_message_error_cp" =>SECCION1_MESSAGE_ERROR_CP_SCHEDULE_ESP
            );
        }
        else{
            $info=array(
                "seccion1_title"=>SECCION1_TITLE_SCHEDULE_ENG,
                "seccion1_name"=>SECCION1_NAME_SCHEDULE_ENG,
                "seccion1_phone"=>SECCION1_PHONE_SCHEDULE_ENG,
                "seccion1_branch"=>SECCION1_BRANCH_SCHEDULE_ENG,
                "seccion1_address_proof"=>SECCION1_ADDRESS_PROOF_SCHEDULE_ENG,
                "seccion1_type_schedule"=>SECCION1_TYPE_SCHEDULE_SCHEDULE_ENG,
                "seccion1_text_type_schedule"=>SECCION1_TEXT_TYPE_SCHEDULE_SCHEDULE_ENG,
                "seccion1_text_rent_type_schedule"=>SECCION1_TEXT_RENT_TYPE_SCHEDULE_SCHEDULE_ENG,
                "seccion1_text_sale_type_schedule"=>SECCION1_TEXT_SALE_TYPE_SCHEDULE_SCHEDULE_ENG,
                "seccion1_text_making_type_schedule"=>SECCION1_TEXT_MAKING_TYPE_SCHEDULE_SCHEDULE_ENG,
                "seccion1_event_date"=>SECCION1_EVENT_DATE_SCHEDULE_ENG,
                "seccion1_hour"=>SECCION1_HOUR_SCHEDULE_ENG,
                "seccion1_model"=>SECCION1_MODEL_SCHEDULE_ENG,
                "seccion1_text_select_model"=>SECCION1_TEXT_SELECT_MODEL_SCHEDULE_ENG,
                "seccion1_text_hour"=>SECCION1_TEXT_HOUR_SCHEDULE_ENG,
                "seccion1_check_event"=>SECCION1_CHECK_EVENT_SCHEDULE_ENG,
                "seccion1_color"=>SECCION1_COLOR_SCHEDULE_ENG,
                "seccion1_size"=>SECCION1_SIZE_SCHEDULE_ENG,
                "seccion1_text_size"=>SECCION1_TEXT_SIZE_SCHEDULE_ENG,
                "seccion1_text_color"=>SECCION1_TEXT_COLOR_SCHEDULE_ENG,
                "seccion1_age"=>SECCION1_AGE_SCHEDULE_ENG,
                "seccion1_price_range"=>SECCION1_PRICE_RANGE_SCHEDULE_ENG,
                "seccion1_error"=>SECCION1_ERROR_ACCOUNT_ENG,
                "seccion1_button"=>SECCION1_BUTTON_SCHEDULE_ENG,
                "seccion1_message"=>SECCION1_MESSAGE_SCHEDULE_ENG,
                "seccion1_date_delivery"=>SECCION1_DATE_DELIVERY_SCHEDULE_ENG,
                "seccion1_text_select_branch"=>SECCION1_TEXT_SELECT_BRANCH_SCHEDULE_ENG,
                "seccion1_message_doubts" =>SECCION1_MESSAGE_DOUBTS_SCHEDULE_ENG,
                "seccion1_ine" =>SECCION1_INE_SCHEDULE_ENG,
                "seccion1_advance" =>SECCION1_ADVANCE_SCHEDULE_ENG,
                "seccion1_not_available" =>SECCION1_MESSAGE_NOT_AVAILABLE_SCHEDULE_ENG,
                "seccion1_message_error_cp" =>SECCION1_MESSAGE_ERROR_CP_SCHEDULE_ENG
            );
        }
        
        return $info;
    }

    public function get_info_product(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "add_cart"=>PRODUCT_ADD_CART_ESP,
                "size"=>PRODUCT_SIZE_ESP,
                "color"=>PRODUCT_COLOR_ESP,
                "pieces"=>PRODUCT_PIECES_ESP,
                "description"=>PRODUCT_DESCRIPTION_ESP
            );
        }
        else{
            $info=array(
                "add_cart"=>PRODUCT_ADD_CART_ENG,
                "size"=>PRODUCT_SIZE_ENG,
                "color"=>PRODUCT_COLOR_ENG,
                "pieces"=>PRODUCT_PIECES_ENG,
                "description"=>PRODUCT_DESCRIPTION_ENG
            );
        }
        
        return $info;
    }

    public function get_info_pay(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "title"=>PAY_TITLE_ESP,
                "name"=>PAY_NAME_ESP,
                "card"=>PAY_CARD_NUMBER_ESP,
                "date"=>PAY_EXPIRY_DATE_ESP,
                "pay"=>PAY_PAY_ESP
            );
        }
        else{
            $info=array(
                "title"=>PAY_TITLE_ENG,
                "name"=>PAY_NAME_ENG,
                "card"=>PAY_CARD_NUMBER_ENG,
                "date"=>PAY_EXPIRY_DATE_ENG,
                "pay"=>PAY_PAY_ENG
            );
        }
        
        return $info;
    }

    public function get_info_user(){
        if($this->idLanguage == 1)
        {
            $info=array(
                "title"=>USER_TITLE_ESP,
                "exit"=>USER_EXIT_ESP,
                "name"=>USER_NAME_ESP,
                "phone"=>USER_PHONE_ESP,
                "address"=>USER_ADDRESS_ESP,
                "cp"=>USER_CP_ESP,
                "error"=>USER_ERROR_ESP,
                "update"=>USER_UPDATE_ESP,
                "date"=>USER_DATE_ESP,
                "branch"=>USER_BRANCH_ESP,
                "product"=>USER_PRODUCT_ESP,
                "price"=>USER_PRICE_ESP,
                "advance"=>USER_ADVANCE_ESP,
                "schedule_pending"=>USER_SCHEDULE_PENDING_ESP,
                "type_schedule"=>USER_TYPE_SCHEDULE_ESP,
                "type_rent"=>USER_TYPE_RENT_ESP,
                "type_making"=>USER_TYPE_MAKING_ESP
            );
        }
        else{
            $info=array(
                "title"=>USER_TITLE_ENG,
                "exit"=>USER_EXIT_ENG,
                "name"=>USER_NAME_ENG,
                "phone"=>USER_PHONE_ENG,
                "address"=>USER_ADDRESS_ENG,
                "cp"=>USER_CP_ENG,
                "error"=>USER_ERROR_ENG,
                "update"=>USER_UPDATE_ENG,
                "date"=>USER_DATE_ENG,
                "branch"=>USER_BRANCH_ENG,
                "product"=>USER_PRODUCT_ENG,
                "price"=>USER_PRICE_ENG,
                "advance"=>USER_ADVANCE_ENG,
                "schedule_pending"=>USER_SCHEDULE_PENDING_ENG,
                "type_schedule"=>USER_TYPE_SCHEDULE_ENG,
                "type_rent"=>USER_TYPE_RENT_ENG,
                "type_making"=>USER_TYPE_MAKING_ENG
            );
        }
        
        return $info;
    }
}
?>
