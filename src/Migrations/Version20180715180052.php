<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180715180052 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE announce ADD race_id INT NOT NULL, ADD coat_color_id INT NOT NULL, ADD coat_style_color_id INT NOT NULL, ADD coat_id INT NOT NULL');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD756E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD753A60210A FOREIGN KEY (coat_color_id) REFERENCES coat_color (id)');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD75ACD043E7 FOREIGN KEY (coat_style_color_id) REFERENCES coat_style_color (id)');
        $this->addSql('ALTER TABLE announce ADD CONSTRAINT FK_E6D6DD7579F419D FOREIGN KEY (coat_id) REFERENCES coat (id)');
        $this->addSql('CREATE INDEX IDX_E6D6DD756E59D40D ON announce (race_id)');
        $this->addSql('CREATE INDEX IDX_E6D6DD753A60210A ON announce (coat_color_id)');
        $this->addSql('CREATE INDEX IDX_E6D6DD75ACD043E7 ON announce (coat_style_color_id)');
        $this->addSql('CREATE INDEX IDX_E6D6DD7579F419D ON announce (coat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD756E59D40D');
        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD753A60210A');
        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD75ACD043E7');
        $this->addSql('ALTER TABLE announce DROP FOREIGN KEY FK_E6D6DD7579F419D');
        $this->addSql('DROP INDEX IDX_E6D6DD756E59D40D ON announce');
        $this->addSql('DROP INDEX IDX_E6D6DD753A60210A ON announce');
        $this->addSql('DROP INDEX IDX_E6D6DD75ACD043E7 ON announce');
        $this->addSql('DROP INDEX IDX_E6D6DD7579F419D ON announce');
        $this->addSql('ALTER TABLE announce DROP race_id, DROP coat_color_id, DROP coat_style_color_id, DROP coat_id');
    }
}
