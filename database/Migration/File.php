<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class File
 *
 * @since 2.0
 *
 * @Migration(time=20191005210215)
 */
class File extends BaseMigration
{
    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('IMTransmitFile', function (Blueprint $blueprint){
            $blueprint->mediumIncrements('id');
            $blueprint->string('name')->comment('文件名称');
            $blueprint->string('clientFilename')->comment('文件原名称');
            $blueprint->string('thumbFilename')->comment('视频缩略图名称');
            $blueprint->string('duration')->comment('录音或视频时间');
            $blueprint->smallInteger('linkId')->unsigned()->comment('模块Id');
            $blueprint->string('module')->comment('模块');
            $blueprint->string('key')->nullable(true)->comment('key|第三方key');
            $blueprint->string('type')->comment('文件类型');
            $blueprint->integer('size')->default(0)->comment('文件大小');
            $blueprint->integer('width')->default(0)->comment('图片宽');
            $blueprint->integer('height')->default(0)->comment('图片高');
            $blueprint->string('url')->default(null)->comment('url|第三方路径');
            $blueprint->tinyInteger('status', false, true, 3)->default(1)->comment('是否有效');
            $blueprint->timestamps();
        });

    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->schema->dropIfExists('IMTransmitFile');
    }
}
