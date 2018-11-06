<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181106183929 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE document ADD entreprise_id_id INT NOT NULL, ADD attached_to VARCHAR(16) NOT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76DAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_D8698A76DAC5BE2B ON document (entreprise_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76DAC5BE2B');
        $this->addSql('DROP INDEX IDX_D8698A76DAC5BE2B ON document');
        $this->addSql('ALTER TABLE document DROP entreprise_id_id, DROP attached_to');
    }
}
