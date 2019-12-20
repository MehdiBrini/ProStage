<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191220000859 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stage ADD type_formation_id INT NOT NULL, ADD entreprise_reliee_id INT NOT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369D543922B FOREIGN KEY (type_formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93699A106DA6 FOREIGN KEY (entreprise_reliee_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369D543922B ON stage (type_formation_id)');
        $this->addSql('CREATE INDEX IDX_C27C93699A106DA6 ON stage (entreprise_reliee_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369D543922B');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93699A106DA6');
        $this->addSql('DROP INDEX IDX_C27C9369D543922B ON stage');
        $this->addSql('DROP INDEX IDX_C27C93699A106DA6 ON stage');
        $this->addSql('ALTER TABLE stage DROP type_formation_id, DROP entreprise_reliee_id');
    }
}
