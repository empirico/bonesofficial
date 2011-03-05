<?php
class Bones_Utils_Editor {

	public $editor;
	
	const TOOLBAR_STANDARD = 'limelight';
	const TOOLBAR_MINIMAL = 'minimal';
	const TOOLBAR_JOURNAL_POST = 'journal_post';
	
	private $value = '';
	private $height = '500';
	private $toolbarSet ;
	private $instance = __CLASS__;
	
	
	public function __construct($instance = __CLASS__) {
		$this->toolbarSet = self::TOOLBAR_STANDARD;
		$this->instance = $instance;
		
	}

	public function setInstance($value){
	
		$this->instance = $value;
	
	}
	public function setValue($value){

		$this->value = stripslashes($value);

	}

	public function setHeight($value) {
		
        $this->height = $value;
	}

    public function setToolbarSet($value) {

        $this->toolbarSet = $value;
    }

	public function getEditor(){
	
		return $this->editor;
	}
	
	public function create(){
		
		$this->editor =  new FCKeditor($this->instance);
		$this->editor->BasePath = '/js/fckeditor/' ;
		$this->editor->Height = $this->height;
		$this->editor->ToolbarSet =  $this->toolbarSet;
		$this->editor->Value = $this->value;
		return $this->editor->Create();
	}
	
	public function generateJS(){
		$JS = <<<FCKEDITOR
		<script type="text/javascript">
		<!--
		oFCKeditor = new FCKeditor( '$this->instance' ) ;
		
		oFCKeditor.Config['ToolbarStartExpanded'] = true ;
		oFCKeditor.ToolbarSet	= '$this->toolbarSet' ;
		oFCKeditor.BasePath	= '/js/fckeditor/' ;
		oFCKeditor.Value	= '$this->value' ;
		oFCKeditor.Create() ;
		</script>
FCKEDITOR;
	return $JS;
	}



}
