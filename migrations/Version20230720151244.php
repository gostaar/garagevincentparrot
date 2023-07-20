<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230720151244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE contact_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE garage_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE horaire_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE marque_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE modele_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE service_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE temoignage_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE voiture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE contact (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, message TEXT NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE garage (id INT NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, description TEXT NOT NULL, histoire TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE horaire (id INT NOT NULL, garage_id INT DEFAULT NULL, jour TEXT DEFAULT NULL, am TEXT DEFAULT NULL, pm TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BBC83DB6C4FFF555 ON horaire (garage_id)');
        $this->addSql('COMMENT ON COLUMN horaire.jour IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN horaire.am IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN horaire.pm IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE marque (id INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE modele (id INT NOT NULL, marque_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_100285584827B9B2 ON modele (marque_id)');
        $this->addSql('CREATE TABLE service (id INT NOT NULL, garage_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description TEXT NOT NULL, photo VARCHAR(255) DEFAULT NULL, prix INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E19D9AD2C4FFF555 ON service (garage_id)');
        $this->addSql('CREATE TABLE temoignage (id INT NOT NULL, garage_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description TEXT NOT NULL, note INT NOT NULL, date_t TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BDADBC46C4FFF555 ON temoignage (garage_id)');
        $this->addSql('COMMENT ON COLUMN temoignage.date_t IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE voiture (id INT NOT NULL, modele_id INT DEFAULT NULL, garage_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, annee INT NOT NULL, km INT NOT NULL, image_principale VARCHAR(255) NOT NULL, galerie_image TEXT DEFAULT NULL, est_vendu BOOLEAN NOT NULL, description TEXT NOT NULL, date_publication TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, caracteristique TEXT DEFAULT NULL, equipements TEXT DEFAULT NULL, prix INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E9E2810FAC14B70A ON voiture (modele_id)');
        $this->addSql('CREATE INDEX IDX_E9E2810FC4FFF555 ON voiture (garage_id)');
        $this->addSql('COMMENT ON COLUMN voiture.galerie_image IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN voiture.date_publication IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN voiture.caracteristique IS \'(DC2Type:array)\'');
        $this->addSql('COMMENT ON COLUMN voiture.equipements IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE horaire ADD CONSTRAINT FK_BBC83DB6C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_100285584827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE temoignage ADD CONSTRAINT FK_BDADBC46C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE contact_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE garage_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE horaire_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE marque_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE modele_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE service_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE temoignage_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE voiture_id_seq CASCADE');
        $this->addSql('ALTER TABLE horaire DROP CONSTRAINT FK_BBC83DB6C4FFF555');
        $this->addSql('ALTER TABLE modele DROP CONSTRAINT FK_100285584827B9B2');
        $this->addSql('ALTER TABLE service DROP CONSTRAINT FK_E19D9AD2C4FFF555');
        $this->addSql('ALTER TABLE temoignage DROP CONSTRAINT FK_BDADBC46C4FFF555');
        $this->addSql('ALTER TABLE voiture DROP CONSTRAINT FK_E9E2810FAC14B70A');
        $this->addSql('ALTER TABLE voiture DROP CONSTRAINT FK_E9E2810FC4FFF555');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE temoignage');
        $this->addSql('DROP TABLE voiture');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
