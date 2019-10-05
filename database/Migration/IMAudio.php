<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class IMAudio
 *
 * @since 2.0
 *
 * @Migration(time=20191005091846)
 */
class IMAudio extends BaseMigration
{

    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('IMAudio', function (Blueprint $blueprint){
            $blueprint->mediumIncrements('id');
            $blueprint->string('name')->default('')->comment('群名称');
            $blueprint->string('avatar')->default('')->comment('群头像');
            $blueprint->string('describe')->default('')->comment('群说明');
            $blueprint->integer('creator')->unsigned()->default(0)->comment('创建者Id');
            $blueprint->tinyInteger('type', false, true, 3)->comment('群组类型，1-固定;2-临时群');
            $blueprint->integer('userCnt', false, true)->default(0)->comment('群员人数');
            $blueprint->tinyInteger('status', false, true, 3)->default(1)->comment('是否删除,0-正常，1-删除');
            $blueprint->timestamps();
            $blueprint->index('name');
            $blueprint->index('creator');
        });

    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->schema->dropIfExists('IMAudio');
    }
}
