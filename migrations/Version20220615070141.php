<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615070141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE band_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE instrument_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE member_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE style_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE band (id INT NOT NULL, name VARCHAR(128) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE band_member (band_id INT NOT NULL, member_id INT NOT NULL, PRIMARY KEY(band_id, member_id))');
        $this->addSql('CREATE INDEX IDX_89A1C7A949ABEB17 ON band_member (band_id)');
        $this->addSql('CREATE INDEX IDX_89A1C7A97597D3FE ON band_member (member_id)');
        $this->addSql('CREATE TABLE band_style (band_id INT NOT NULL, style_id INT NOT NULL, PRIMARY KEY(band_id, style_id))');
        $this->addSql('CREATE INDEX IDX_CF5F06F649ABEB17 ON band_style (band_id)');
        $this->addSql('CREATE INDEX IDX_CF5F06F6BACD6074 ON band_style (style_id)');
        $this->addSql('CREATE TABLE instrument (id INT NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE member (id INT NOT NULL, name VARCHAR(128) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE member_role (member_id INT NOT NULL, role_id INT NOT NULL, PRIMARY KEY(member_id, role_id))');
        $this->addSql('CREATE INDEX IDX_ABE1A6367597D3FE ON member_role (member_id)');
        $this->addSql('CREATE INDEX IDX_ABE1A636D60322AC ON member_role (role_id)');
        $this->addSql('CREATE TABLE member_instrument (member_id INT NOT NULL, instrument_id INT NOT NULL, PRIMARY KEY(member_id, instrument_id))');
        $this->addSql('CREATE INDEX IDX_D7F177347597D3FE ON member_instrument (member_id)');
        $this->addSql('CREATE INDEX IDX_D7F17734CF11D9C ON member_instrument (instrument_id)');
        $this->addSql('CREATE TABLE role (id INT NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE style (id INT NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE band_member ADD CONSTRAINT FK_89A1C7A949ABEB17 FOREIGN KEY (band_id) REFERENCES band (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE band_member ADD CONSTRAINT FK_89A1C7A97597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE band_style ADD CONSTRAINT FK_CF5F06F649ABEB17 FOREIGN KEY (band_id) REFERENCES band (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE band_style ADD CONSTRAINT FK_CF5F06F6BACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE member_role ADD CONSTRAINT FK_ABE1A6367597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE member_role ADD CONSTRAINT FK_ABE1A636D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE member_instrument ADD CONSTRAINT FK_D7F177347597D3FE FOREIGN KEY (member_id) REFERENCES member (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE member_instrument ADD CONSTRAINT FK_D7F17734CF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE band_member DROP CONSTRAINT FK_89A1C7A949ABEB17');
        $this->addSql('ALTER TABLE band_style DROP CONSTRAINT FK_CF5F06F649ABEB17');
        $this->addSql('ALTER TABLE member_instrument DROP CONSTRAINT FK_D7F17734CF11D9C');
        $this->addSql('ALTER TABLE band_member DROP CONSTRAINT FK_89A1C7A97597D3FE');
        $this->addSql('ALTER TABLE member_role DROP CONSTRAINT FK_ABE1A6367597D3FE');
        $this->addSql('ALTER TABLE member_instrument DROP CONSTRAINT FK_D7F177347597D3FE');
        $this->addSql('ALTER TABLE member_role DROP CONSTRAINT FK_ABE1A636D60322AC');
        $this->addSql('ALTER TABLE band_style DROP CONSTRAINT FK_CF5F06F6BACD6074');
        $this->addSql('DROP SEQUENCE band_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE instrument_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE member_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE role_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE style_id_seq CASCADE');
        $this->addSql('DROP TABLE band');
        $this->addSql('DROP TABLE band_member');
        $this->addSql('DROP TABLE band_style');
        $this->addSql('DROP TABLE instrument');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE member_role');
        $this->addSql('DROP TABLE member_instrument');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
