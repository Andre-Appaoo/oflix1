<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221194557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artwork (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, title VARCHAR(255) NOT NULL, release_date INT NOT NULL, duration INT NOT NULL, summary VARCHAR(255) NOT NULL, synopsis LONGTEXT NOT NULL, poster VARCHAR(255) NOT NULL, rating DOUBLE PRECISION NOT NULL, INDEX IDX_881FC576C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artwork_genre (artwork_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_12BA5BE2DB8FFA4 (artwork_id), INDEX IDX_12BA5BE24296D31F (genre_id), PRIMARY KEY(artwork_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC576C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE artwork_genre ADD CONSTRAINT FK_12BA5BE2DB8FFA4 FOREIGN KEY (artwork_id) REFERENCES artwork (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artwork_genre ADD CONSTRAINT FK_12BA5BE24296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC576C54C8C93');
        $this->addSql('ALTER TABLE artwork_genre DROP FOREIGN KEY FK_12BA5BE2DB8FFA4');
        $this->addSql('ALTER TABLE artwork_genre DROP FOREIGN KEY FK_12BA5BE24296D31F');
        $this->addSql('DROP TABLE artwork');
        $this->addSql('DROP TABLE artwork_genre');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE type');
    }
}
