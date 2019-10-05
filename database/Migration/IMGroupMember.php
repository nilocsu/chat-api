<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class IMGroupMember
 *
 * @since 2.0
 *
 * @Migration(time=20191005093922)
 */
class IMGroupMember extends BaseMigration
{
    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('admin', function (Blueprint $blueprint){
            $blueprint->mediumIncrements('id');
            $blueprint->integer('groupId')->unsigned()->comment('群Id');
            $blueprint->integer('userId')->unsigned()->comment('用户Id');
            $blueprint->string('nickName', 50)->default(null)->comment('备注');
            $blueprint->integer('role')->default(0)->comment('群角色 1管理员， 0普通成员');
            $blueprint->tinyInteger('status', false, true, 4)->default(1)->comment('是否退出群，0-正常，1-已退出');
            $blueprint->timestamps();
            $blueprint->index(['groupId', 'userId', 'status']);
            $blueprint->index(['userId', 'status', 'updated_at']);
            $blueprint->index(['groupId', 'updated_at']);
        });

    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->schema->dropIfExists('admin');
    }
}
