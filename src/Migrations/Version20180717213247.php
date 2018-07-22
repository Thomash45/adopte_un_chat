<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180717213247 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE coat_color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE announce (id INT AUTO_INCREMENT NOT NULL, coat_color_id INT NOT NULL, coat_style_color_id INT NOT NULL, coat_id INT NOT NULL, name VARCHAR(255) NOT NULL, year INT DEFAULT NULL, description LONGTEXT NOT NULL, adresse VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, departement VARCHAR(255) DEFAULT NULL, region VARCHAR(255) DEFAULT NULL, telephone_number VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, image_size INT NOT NULL, updated_at DATETIME NOT NULL, street_number VARCHAR(255) DEFAULT NULL, road VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, INDEX IDX_E6D6DD753A60210A (coat_color_id), INDEX IDX_E6D6DD75ACD043E7 (coat_style_color_id), INDEX IDX_E6D6DD7579F419D (coat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coat_style_color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, male VARCHAR(255) NOT NULL, female VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD753A60210A FOREIGN KEY (coat_color_id) REFERENCES coat_color (id)');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD75ACD043E7 FOREIGN KEY (coat_style_color_id) REFERENCES coat_style_color (id)');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD7579F419D FOREIGN KEY (coat_id) REFERENCES coat (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD753A60210A');
        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD7579F419D');
        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD75ACD043E7');
        $this->addSql('DROP TABLE coat_color');
        $this->addSql('DROP TABLE coat');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE announce');
        $this->addSql('DROP TABLE coat_style_color');
        $this->addSql('DROP TABLE gender');
    }
}
