<?php

namespace MobileOperatorsCodes;

use PDO;

/**
 * Класс поиска записи о номере телефона в БД.
 */
class Reader
{
    /**
     * @var string Путь к БД
     */
    protected $dbPath = '/../../data/mobile_operators_codes.db';

    /**
     * @var PDO Объект БД
     */
    protected $db;

    /**
     * Конструктор.
     */
    public function __construct()
    {
        $dbPath = __DIR__ . $this->dbPath;
        $this->db = new PDO('sqlite:' . $dbPath);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Осуществляет поиск записи о номере телефона и возвращает ее. Если формат телефона неверный или запись не найдена,
     * то выбрасывается исключение.
     *
     * @param string $phoneNumber
     * @return Record
     * @throws WrongPhoneNumberFormatException
     * @throws RecordNotFoundException
     */
    public function findRecord($phoneNumber)
    {
        $phoneNumber = preg_replace('/[^\d]/', '', $phoneNumber);
        $phoneNumber = substr($phoneNumber, -10);

        if (strlen($phoneNumber) != 10) {
            throw new WrongPhoneNumberFormatException();
        }

        $code = substr($phoneNumber, 0, 3);
        $number = substr($phoneNumber, -7);

        $statement = $this->db->prepare(
            'SELECT "operator", "region" ' .
            'FROM "record" ' .
            'WHERE "code" = :code ' .
            'AND :number BETWEEN "from" AND "TO" ' .
            'LIMIT 1'
        );

        $statement->execute([
            ':code' => $code,
            ':number' => $number,
        ]);

        $row = $statement->fetch();

        if ($row === false) {
            throw new RecordNotFoundException();
        }

        return new Record($code, $number, $row['operator'], $row['region']);
    }
}