<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613135626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE member_instrument (member_id INT NOT NULL, instrument_id INT NOT NULL, PRIMARY KEY(member_id, instrument_id))');
        $this->addSql('CREATE INDEX IDX_D7F177347597D3FE ON member_instrument (member_id)');
        $this->addSql('CREATE INDEX IDX_D7F17734CF11D9C ON member_instrument (instrument_id)');
        $this->addSql('ALTER TABLE member_instrument ADD CONSTRAINT FK_D7F177347597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE member_instrument ADD CONSTRAINT FK_D7F17734CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE member_instrument');
    }
}
