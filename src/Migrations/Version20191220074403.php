<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191220074403 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stage_formation (stage_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_734BDB9E2298D193 (stage_id), INDEX IDX_734BDB9E5200282E (formation_id), PRIMARY KEY(stage_id, formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage_formation ADD CONSTRAINT FK_734BDB9E2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_formation ADD CONSTRAINT FK_734BDB9E5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise ADD activite LONGTEXT NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, DROP siege_social, DROP num_tel, DROP adresse_mail, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE site_web site_web VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93699A106DA6');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369D543922B');
        $this->addSql('DROP INDEX IDX_C27C9369D543922B ON stage');
        $this->addSql('DROP INDEX IDX_C27C93699A106DA6 ON stage');
        $this->addSql('ALTER TABLE stage ADD entreprise_id INT NOT NULL, ADD titre VARCHAR(255) NOT NULL, ADD description LONGTEXT NOT NULL, ADD email VARCHAR(255) NOT NULL, DROP type_formation_id, DROP entreprise_reliee_id, DROP id_stage, DROP intitule, DROP domaine, DROP nom_entreprise, DROP formation, DROP lieu, DROP contact_mail');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369A4AEAFEA ON stage (entreprise_id)');
        $this->addSql('ALTER TABLE formation ADD nom_court VARCHAR(255) NOT NULL, ADD nom_long VARCHAR(255) NOT NULL, DROP titre, DROP description, DROP domaine, DROP niveau_delivre');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stage_formation');
        $this->addSql('ALTER TABLE entreprise ADD siege_social VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD num_tel VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD adresse_mail VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP activite, DROP adresse, DROP email, CHANGE nom nom VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE site_web site_web VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE formation ADD titre VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD description VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD domaine VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD niveau_delivre VARCHAR(6) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP nom_court, DROP nom_long');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369A4AEAFEA');
        $this->addSql('DROP INDEX IDX_C27C9369A4AEAFEA ON stage');
        $this->addSql('ALTER TABLE stage ADD entreprise_reliee_id INT NOT NULL, ADD id_stage INT NOT NULL, ADD intitule VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD domaine VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD nom_entreprise VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD formation VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD lieu VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD contact_mail VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP titre, DROP description, DROP email, CHANGE entreprise_id type_formation_id INT NOT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93699A106DA6 FOREIGN KEY (entreprise_reliee_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369D543922B FOREIGN KEY (type_formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369D543922B ON stage (type_formation_id)');
        $this->addSql('CREATE INDEX IDX_C27C93699A106DA6 ON stage (entreprise_reliee_id)');
    }
}
