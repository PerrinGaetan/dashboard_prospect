<?php

namespace App\Model;

use PDO;

class IndexModel extends AbstractManager
{
    public const TABLE = 'entreprise';

    public function selectAll(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectByTag(string $id): ?array
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE entreprise LIKE :id");
        $statement->bindValue('id', "%$id%", \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
}
