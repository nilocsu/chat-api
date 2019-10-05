<?php declare(strict_types=1);


namespace Database\Migration;


use Swoft\Db\Schema\Blueprint;
use Swoft\Devtool\Annotation\Mapping\Migration;
use Swoft\Devtool\Migration\Migration as BaseMigration;

/**
 * Class User
 *
 * @since 2.0
 *
 * @Migration(time=20191005070146)
 */
class User extends BaseMigration
{
    /**
     * @return void
     */
    public function up(): void
    {
        $this->schema->createIfNotExists('user', function (Blueprint $blueprint){
            $blueprint->comment('用户表');
            $blueprint->increments('id');
            $blueprint->string('name', 50);
            $blueprint->string('password')->comment('密码');
            $blueprint->string('avatar')->comment('头像')->default('');
            $blueprint->string('signature')->default('')->comment('个性签名');
            $blueprint->string('email')->default(null)->comment('邮箱');
            $blueprint->tinyInteger('sex', false, true, 1)->default(0)->comment('性别');
            $blueprint->string('bubble')->default(null)->comment('气泡');
            $blueprint->string('projectTheme')->default(null)->comment('项目主题');
            $blueprint->string('chatColor')->default(null)->comment('聊天文字颜色');
            $blueprint->tinyInteger('status', false, true, 1)->default(1)->comment('1 已使用 0 未使用');
            $blueprint->timestamp('lastLoginTime')->default(null)->comment('注册时间');
            $blueprint->timestamp('lastLoginTime')->default(null)->comment('注册时间');
        });

    }

    /**
     * @return void
     */
    public function down(): void
    {
        $this->schema->dropIfExists('user');
    }
}
