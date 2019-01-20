<?php
/**
 * Created by PhpStorm.
 * User: Posi_
 * Date: 13.01.2019
 * Time: 18:25
 */

namespace app\components;


use app\models\tables\Tasks;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;

class Bootstrap extends Component implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    /** @var Application */
    protected $app;

    public function bootstrap($app)
    {
        $this->app = $app;
        $this->setLang();
//        $this->attachEventsHandlers();
    }

    protected function setLang()
    {
        $this->app->language = $this->app->session->get('lang');
    }

    protected function attachEventsHandlers()
    {
        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function ($event) {

            $task = $event->sender;
            $user = $task->responsible;

            Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom('administrator@test.ru')
                ->setSubject('У вас новая задача')
                ->setTextBody("На вас поставлена новая задача {$task->name}")
                ->send();
        });
    }
}