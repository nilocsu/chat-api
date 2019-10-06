<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class IMGroup
 *
 * @since 2.0
 *
 * @Migration(time=20191005092948)
 */
class IMGroup extends BaseMigration
{

    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('IMGroup', function (Blueprint $blueprint){
            $blueprint->increments('id');
            $blueprint->string('name')->default('')->comment('群名称');
            $blueprint->string('avatar')->default('')->default('群头像');
            $blueprint->integer('creator')->unsigned()->default(0)->comment('创建者Id');
            $blueprint->tinyInteger('type', false, true, 3)->comment('群组类型，1-固定;2-临时群');
            $blueprint->integer('userCnt', false, true)->default(0)->comment('群员人数');
            $blueprint->timestamp('createdAt')->nullable(true);
            $blueprint->timestamp('updatedAt')->nullable(true);
            $blueprint->index('creator');
        });

    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->schema->dropIfExists('IMGroup');
    }
}
