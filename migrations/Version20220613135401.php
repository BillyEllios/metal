<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613135401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE band_style (band_id INT NOT NULL, style_id INT NOT NULL, PRIMARY KEY(band_id, style_id))');
        $this->addSql('CREATE INDEX IDX_CF5F06F649ABEB17 ON band_style (band_id)');
        $this->addSql('CREATE INDEX IDX_CF5F06F6BACD6074 ON band_style (style_id)');
        $this->addSql('ALTER TABLE band_style ADD CONSTRAINT FK_CF5F06F649ABEB17 FOREIGN KEY (band_id) REFERENCES band (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE band_style ADD CONSTRAINT FK_CF5F06F6BACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE band_style');
    }
}
