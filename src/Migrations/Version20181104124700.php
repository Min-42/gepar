<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181104124700 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(64) NOT NULL, fichier VARCHAR(255) NOT NULL, extension VARCHAR(8) NOT NULL, taille VARCHAR(16) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, documents_id INT DEFAULT NULL, code_siren VARCHAR(9) NOT NULL, nom VARCHAR(255) NOT NULL, groupe VARCHAR(255) NOT NULL, contacts LONGTEXT NOT NULL, convention_collective VARCHAR(4) NOT NULL, tranche_effectif VARCHAR(255) NOT NULL, nb_adherents INT NOT NULL, notes LONGTEXT NOT NULL, INDEX IDX_D19FA605F0F2752 (documents_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invitation (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT NOT NULL, documents_id INT DEFAULT NULL, date_envoi DATETIME NOT NULL, date_reception DATETIME NOT NULL, dates_reunion LONGTEXT NOT NULL, adresse VARCHAR(255) NOT NULL, perimetre VARCHAR(255) NOT NULL, negociation VARCHAR(16) NOT NULL, notes LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_F11D61A2A4AEAFEA (entreprise_id), INDEX IDX_F11D61A25F0F2752 (documents_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA605F0F2752 FOREIGN KEY (documents_id) REFERENCES document (id)');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A2A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A25F0F2752 FOREIGN KEY (documents_id) REFERENCES document (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA605F0F2752');
        $this->addSql('ALTER TABLE invitation DROP FOREIGN KEY FK_F11D61A25F0F2752');
        $this->addSql('ALTER TABLE invitation DROP FOREIGN KEY FK_F11D61A2A4AEAFEA');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE invitation');
    }
}
