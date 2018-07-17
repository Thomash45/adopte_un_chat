<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180717195303 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE announce ADD street_number VARCHAR(255) DEFAULT NULL, ADD road VARCHAR(255) DEFAULT NULL, ADD country VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD75A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E6D6DD75A76ED395 ON announce (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD75A76ED395');
        $this->addSql('DROP INDEX IDX_E6D6DD75A76ED395 ON announce');
        $this->addSql('ALTER TABLE announce DROP street_number, DROP road, DROP country');
    }
}