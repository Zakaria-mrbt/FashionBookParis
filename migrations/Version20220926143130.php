<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926143130 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_comment (id INT AUTO_INCREMENT NOT NULL, id_profil_id INT NOT NULL, id_post_id INT NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_A99CE55FA76B6C5F (id_profil_id), INDEX IDX_A99CE55F9514AA5C (id_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_like (id INT AUTO_INCREMENT NOT NULL, id_profil_id INT NOT NULL, id_post_id INT NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_653627B8A76B6C5F (id_profil_id), INDEX IDX_653627B89514AA5C (id_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_comment ADD CONSTRAINT FK_A99CE55FA76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE post_comment ADD CONSTRAINT FK_A99CE55F9514AA5C FOREIGN KEY (id_post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE post_like ADD CONSTRAINT FK_653627B8A76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE post_like ADD CONSTRAINT FK_653627B89514AA5C FOREIGN KEY (id_post_id) REFERENCES post (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_comment DROP FOREIGN KEY FK_A99CE55FA76B6C5F');
        $this->addSql('ALTER TABLE post_comment DROP FOREIGN KEY FK_A99CE55F9514AA5C');
        $this->addSql('ALTER TABLE post_like DROP FOREIGN KEY FK_653627B8A76B6C5F');
        $this->addSql('ALTER TABLE post_like DROP FOREIGN KEY FK_653627B89514AA5C');
        $this->addSql('DROP TABLE post_comment');
        $this->addSql('DROP TABLE post_like');
    }
}
