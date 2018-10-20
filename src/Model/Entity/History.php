<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * History Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $department
 * @property string $title
 * @property string $subtitle
 * @property string $content
 * @property string $imgUrl
 * @property string $pdfUrl
 * @property \Cake\I18n\FrozenTime $postDate
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class History extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'department' => true,
        'title' => true,
        'subtitle' => true,
        'content' => true,
        'imgUrl' => true,
        'pdfUrl' => true,
        'postDate' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
