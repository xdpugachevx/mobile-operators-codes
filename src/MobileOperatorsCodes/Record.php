<?php

namespace MobileOperatorsCodes;

/**
 * Запись о номере телефона.
 */
class Record
{
    /** Оператор "МегаФон" */
    const OPERATOR_MEGAFON = 'ПАО "МегаФон"';

    /** Оператор "МТС" */
    const OPERATOR_MTS = 'ПАО "Мобильные ТелеСистемы"';

    /** Оператор "Билайн" */
    const OPERATOR_BEELINE = 'ПАО "Вымпел-Коммуникации"';

    /** Оператор "ТЕЛЕ2" */
    const OPERATOR_TELE2 = 'ООО "Т2 Мобайл"';

    /**
     * @var string Код телефона
     */
    protected $phoneCode;

    /**
     * @var string Номер телефона
     */
    protected $phoneNumber;

    /**
     * @var string Название компании оператора
     */
    protected $operator;

    /**
     * @var string Регион телефона
     */
    protected $region;

    /**
     * Конструктор.
     *
     * @param string $phoneCode
     * @param string $phoneNumber
     * @param string $operator
     * @param string $region
     */
    public function __construct($phoneCode, $phoneNumber, $operator, $region)
    {
        $this->phoneCode = $phoneCode;
        $this->phoneNumber = $phoneNumber;
        $this->operator = $operator;
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getPhoneCode()
    {
        return $this->phoneCode;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Возвращает полный номер телефона с префиксом.
     *
     * @param string $prefix
     * @return string
     */
    public function getFullPhoneNumber($prefix = '+7')
    {
        return $prefix . $this->phoneCode . $this->phoneNumber;
    }

    /**
     * Является ли оператор "МегаФон".
     *
     * @return bool
     */
    public function isMegafon() {
        return $this->operator === self::OPERATOR_MEGAFON;
    }

    /**
     * Является ли оператор "Билайн".
     *
     * @return bool
     */
    public function isBeeline() {
        return $this->operator === self::OPERATOR_BEELINE;
    }

    /**
     * Является ли оператор "МТС".
     *
     * @return bool
     */
    public function isMts() {
        return $this->operator === self::OPERATOR_MTS;
    }

    /**
     * Является ли оператор "ТЕЛЕ2".
     *
     * @return bool
     */
    public function isTele2() {
        return $this->operator === self::OPERATOR_TELE2;
    }
}