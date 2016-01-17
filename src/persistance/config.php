<?php
namespace Nenaudinga;

/**
 * @Entity @Table(name="config")
 **/
class Config
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $name;

    /** @Column(type="string", length=60, nullable=false) **/
    protected $tytul;

    /** @Column(type="text", nullable=false) **/
    protected $slogan;

    /** @Column(type="text", nullable=false) **/
    protected $logo;

    /** @Column(type="text", nullable=false) **/
    protected $description;

    /** @Column(type="text", nullable=false) **/
    protected $tags;

    /** @Column(type="integer", nullable=false, options={"default":10}) **/
    protected $img_na_strone;

    /** @Column(type="text") **/
    protected $regulamin;

    /** @Column(type="text", nullable=false) **/
    protected $email;

    /** @Column(type="integer", nullable=false, options={"default":0}) **/
    protected $komentarze;

    /** @Column(type="integer", nullable=false, options={"default":1}) **/
    protected $img_title;

    /** @Column(type="integer", nullable=false, options={"default":1}) **/
    protected $req_code;

    /** @Column(type="integer", nullable=false, options={"default":500}) **/
    protected $max_file_size;

     /** @Column(type="integer", nullable=false, options={"default":1}) **/
    protected $reklama;

    /** @Column(type="string", length=64) **/
    protected $theme;

    function host() {
        return $_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    }
    function img_url($i) {
        return 'obrazek.php?'.$i;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSlogan()
    {
        return $this->slogan;
    }

    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getImgNaStrone()
    {
        return $this->img_na_strone;
    }

    public function setImgNaStrone($img_na_strone)
    {
        $this->img_na_strone = $img_na_strone;
    }

    public function getTytul()
    {
        return $this->tytul;
    }

    public function setTytul($tytul)
    {
        $this->tytul = $tytul;
    }

    public function getRegulamin()
    {
        return $this->regulamin;
    }

    public function setRegulamin($regulamin)
    {
        $this->regulamin = $regulamin;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getKomentarze()
    {
        return $this->komentarze;
    }

    public function setKomentarze($komentarze)
    {
        $this->komentarze = $komentarze;
    }

    public function getImgTitle()
    {
        return $this->img_title;
    }

    public function setImgTitle($img_title)
    {
        $this->img_title = $img_title;
    }

    public function getReqCode()
    {
        return $this->req_code;
    }

    public function setReqCode($req_code)
    {
        $this->req_code = $req_code;
    }

    public function getMaxFileSize()
    {
        return $this->max_file_size;
    }

    public function setMaxFileSize($max_file_size)
    {
        $this->max_file_size = $max_file_size;
    }

    public function getReklama()
    {
        return $this->reklama;
    }

    public function setReklama($reklama)
    {
        $this->reklama = $reklama;
    }

    public function getTheme()
    {
        return $this->theme;
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
    }
}