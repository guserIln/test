namespace components;
class NavBar extends \yii\bootstrap\NavBar
{
    public function init()
    {
        parent::init();
        Html::removeCssClass($this->options, 'container');
    }
}