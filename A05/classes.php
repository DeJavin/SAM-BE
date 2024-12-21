<?php
class Island {
  public $id;
  public $name;
  public $shortDescription;
  public $longDescription;
  public $color;
  public $image;

  // Constructor to initialize the Island object
  public function __construct($id, $name, $shortDescription, $longDescription, $color, $image) {
    $this->id = $id;
    $this->name = $name;
    $this->shortDescription = $shortDescription;
    $this->longDescription = $longDescription;
    $this->color = $color;
    $this->image = $image;
  }

  // Method to get the Island's ID
  public function getID() {
    return $this->id;
  }

  // Method to generate the island title
  public function generateTitle() {
    return '
      <div class="col-12">
        <p class="text-center lead large-bold-lead mt-4">' . $this->name . '</p>
      </div>
    ';
  }
}


class Content{
  public $id;

  public $fk;

  public $image;

  public $content;

  public $color;

  public function __construct($id, $fk, $image, $content, $color)
  {

    $this->id = $id;

    $this->fk = $fk;

    $this->image = $image;

    $this->content = $content;

    $this->color = $color;

  }

  public function generateContent(){

    return
    '<div class="col-md-4">
    <img src="'.$this->image.'" class="card-img-top" alt="climb">
      <h5 class="mt-4">'.$this->content.'</h5>
    </div>';
  }
}

?>