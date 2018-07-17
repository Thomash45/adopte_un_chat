<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180717210501 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, male VARCHAR(255) NOT NULL, female VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE announce ADD gender_id INT NOT NULL, ADD lat DOUBLE PRECISION DEFAULT NULL, ADD logt DOUBLE PRECISION DEFAULT NULL, ADD is_granted TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD75708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('CREATE INDEX IDX_E6D6DD75708A0E0 ON announce (gender_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD75708A0E0');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP INDEX IDX_E6D6DD75708A0E0 ON announce');
        $this->addSql('ALTER TABLE announce DROP gender_id, DROP lat, DROP logt, DROP is_granted');
    }
}
