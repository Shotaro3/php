//処理深さ　コントローラー　ステップ構造の管理のみ
abstract class controler {
	//
	//システムのフローで問い合わせ（ASK）があるまで実行するようにすること
	function __construct($system) {
		$system->test = $this->step1();
	}
	// 各ステップは必ず通ること
	// 対話を求めることがシステムから指定されている場合、ユーザーへの質問を返すこと
	// エラーがある場合、、固有処理がなければ共通処理に委託したい
	abstract function step1();// 対話開始　必要な項目の通知
	abstract function step2();// 精査　　　入力内容のチェック・意訳
	abstract function step3();// 事前確認　実行する内容の通知
	abstract function step4();// 実行　　　実行結果の通知
	abstract function step5();// 終了　　　切り戻しが必要か確認なければ終了

}

//処理の幅　ドメイン　機能の種類でモデルを利用する
class domain extends controler {

	function __construct($system) {
		parent::__construct($system);
	}

	function step1() {
		return 'DB操作するのかー、原稿の項目はこれなのかー、aタグはこれなのかー、ログインに必要な情報はこれなのかー、iPはこれなのかー';
	}
	function step2() {
		return 'クエリはただしいのかー、原稿の入力内容に問題ないのかー、リンク先はここなのかー、あかうんとはとうろくされているのかー、ip制限化かかっているページなのかー';
	}
	function step3() {
		return '実行内容にもんだいないのかー、本当に登録していいのかー、飛んでいいのかー、本当にログインしていいのかー、ー空メソッドー';
	}
	function step4() {
		return 'そうなのかー、登録中だけどもどさなくていいのかー、移動中なのかー、ログイン中なのかー、ー空メソッドー';
	}
	function step5() {
		return 'コミットしていいのかー、登録したけどとりけさないのかー、移動したけどもどらなくていいのかー、ログインしたのかー、ip制限かかっているのかー＾＾';
	}

}

//　処理のフロー管理　フロー定義体と状況把握のみ
class PlainSystem {
	//フローと現在地の管理用
	// use flow;
	//ドメインからの問い合わせ項目の保持
	// use querys;

	// 処理系
	private $common;
	private $unique;

	// 描画系
	private $view;
	public $test;

	// 親に持っていく
	const ASK     = 1;
	const NOT_ASK = 0;
	private $flow;
	private $step;

	//　インスタンス化するドメインの選択
	function __construct() {

		$this->test = "test";

		// 親に持っていく
		// 各ドメインからユーザーに問い合わせをするタイミングを定義する
		// 問い合わせが必要なしであれば次の問い合わせタイミングまで実行する(画面生成を求めない)
		$this->flow = array(
			'katakana' => array(self::ASK, self::ASK, self::ASK, self::ASK, self::ASK),
			'hiragana' => array(self::ASK, self::ASK, self::ASK, self::ASK, self::ASK)
		);
		// イニシャライズクラスが必要
		$this->step = array(
			'katakana' => 0,
			'hiragana' => 0,
		);

		// 共通処理
		// if (false) {
		new domain($this);
		echo 'kakunin:'.$this->test;
		// }
		// //　単一
		// swicth() {
		//     case 'katakana':
		new katakana($this);
		//     break;
		//     case 'hiragana':
		new hiragana($this);
		//     break;
		// }
		// // 画面出力
		// $this->view;
	}

}

// trait frow {
// }
// trait query {
// }

class katakana extends controler {

	function __construct($system) {
		parent::__construct($system);
	}
	function step1() {
		echo 'ステップ1';
		return true;
	}
	function step2() {
		echo 'ステップ2';
		return true;
	}
	function step3() {
		echo 'ステップ3';
		return true;
	}
	function step4() {
		echo 'ステップ4';
		return true;
	}
	function step5() {
		echo 'ステップ5';
		return true;
	}

}
class hiragana extends controler {

	function __construct($system) {
		parent::__construct($system);
	}
	function step1() {
		echo 'すてっぷ1';
		return true;
	}
	function step2() {
		echo 'すてっぷ2';
		return true;
	}
	function step3() {
		echo 'すてっぷ3';
		return true;
	}
	function step4() {
		echo 'すてっぷ4';
		return true;
	}
	function step5() {
		echo 'すてっぷ5';
		return true;
	}

}

new PlainSystem();
