<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613135502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE band_concert (band_id INT NOT NULL, concert_id INT NOT NULL, PRIMARY KEY(band_id, concert_id))');
        $this->addSql('CREATE INDEX IDX_2451A5AD49ABEB17 ON band_concert (band_id)');
        $this->addSql('CREATE INDEX IDX_2451A5AD83C97B2E ON band_concert (concert_id)');
        $this->addSql('ALTER TABLE band_concert ADD CONSTRAINT FK_2451A5AD49ABEB17 FOREIGN KEY (band_id) REFERENCES band (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE band_concert ADD CONSTRAINT FK_2451A5AD83C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE band_concert');
    }
}
