<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613135209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE band_member (band_id INT NOT NULL, member_id INT NOT NULL, PRIMARY KEY(band_id, member_id))');
        $this->addSql('CREATE INDEX IDX_89A1C7A949ABEB17 ON band_member (band_id)');
        $this->addSql('CREATE INDEX IDX_89A1C7A97597D3FE ON band_member (member_id)');
        $this->addSql('ALTER TABLE band_member ADD CONSTRAINT FK_89A1C7A949ABEB17 FOREIGN KEY (band_id) REFERENCES band (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE band_member ADD CONSTRAINT FK_89A1C7A97597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE band_member');
    }
}
