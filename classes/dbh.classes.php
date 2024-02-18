<?php

class Dbh
{
    public function connect()
    {
        // Load environment variables from .env file
        $envFile = '.env';
        $envVar = $this->parseEnv($envFile);

        // Check if .env file exists and contains necessary variables
        if (!$envVar || !isset($envVar['DB_USERNAME']) || !isset($envVar['DB_PASSWORD'])) {
            die("Erreur de connexion à la base de données ! Contactez l'administrateur du site.");
        }

        try {
            // Connect to the database using environment variables
            $dbh = new PDO('mysql:host=localhost;dbname=' . $envVar['DB_NAME'] . ';charset=utf8', $envVar['DB_USERNAME'], $envVar['DB_PASSWORD']);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            );
            return $dbh;
        } catch (PDOException $e) {
            die("Erreur !:" . $e->getMessage() . "<br/>");
        }
    }

    private function parseEnv($file)
    {
        $variables = [];
        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') !== 0) {
                    list($name, $value) = explode('=', $line, 2);
                    $variables[trim($name)] = trim($value);
                }
            }
        }
        return $variables;
    }
}
