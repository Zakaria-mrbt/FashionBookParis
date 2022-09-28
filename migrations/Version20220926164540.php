<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926164540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_comment_like (id INT AUTO_INCREMENT NOT NULL, id_comment_id INT NOT NULL, is_active TINYINT(1) NOT NULL, INDEX IDX_21689F8C5DE3FDC4 (id_comment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_comment_like ADD CONSTRAINT FK_21689F8C5DE3FDC4 FOREIGN KEY (id_comment_id) REFERENCES post_comment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_comment_like DROP FOREIGN KEY FK_21689F8C5DE3FDC4');
        $this->addSql('DROP TABLE post_comment_like');
    }
}
