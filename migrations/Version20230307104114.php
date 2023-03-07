<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307104114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plat_reservation (plat_id INT NOT NULL, reservation_id INT NOT NULL, PRIMARY KEY(plat_id, reservation_id))');
        $this->addSql('CREATE INDEX IDX_382951C2D73DB560 ON plat_reservation (plat_id)');
        $this->addSql('CREATE INDEX IDX_382951C2B83297E7 ON plat_reservation (reservation_id)');
        $this->addSql('ALTER TABLE plat_reservation ADD CONSTRAINT FK_382951C2D73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plat_reservation ADD CONSTRAINT FK_382951C2B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE formule ADD menu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formule ADD CONSTRAINT FK_605C9C98CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_605C9C98CCD7E912 ON formule (menu_id)');
        $this->addSql('ALTER TABLE plat ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A2077E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_2038A2077E9E4C8C ON plat (photo_id)');
        $this->addSql('ALTER TABLE reservation ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_42C8495519EB6921 ON reservation (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE plat_reservation DROP CONSTRAINT FK_382951C2D73DB560');
        $this->addSql('ALTER TABLE plat_reservation DROP CONSTRAINT FK_382951C2B83297E7');
        $this->addSql('DROP TABLE plat_reservation');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C8495519EB6921');
        $this->addSql('DROP INDEX IDX_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP client_id');
        $this->addSql('ALTER TABLE formule DROP CONSTRAINT FK_605C9C98CCD7E912');
        $this->addSql('DROP INDEX IDX_605C9C98CCD7E912');
        $this->addSql('ALTER TABLE formule DROP menu_id');
        $this->addSql('ALTER TABLE plat DROP CONSTRAINT FK_2038A2077E9E4C8C');
        $this->addSql('DROP INDEX IDX_2038A2077E9E4C8C');
        $this->addSql('ALTER TABLE plat DROP photo_id');
    }
}
