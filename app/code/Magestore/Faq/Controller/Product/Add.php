<?php
namespace Magestore\Faq\Controller\Product;
class Add extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Checkout\Model\Cart
     */
    protected $cart;
    /**
     * @var \Magento\Catalog\Model\Product
     */
    protected $product;
    protected $_productRepository;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
//        \Magento\Catalog\Model\Product $product,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Checkout\Model\Cart $cart
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->cart = $cart;
//        $this->product = $product;
        $this->_productRepository = $productRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $number = $this->getRequest()->getParam('number');
            /*get product id*/
            $pId = 1;//productId
            for ($x = 0; $x < $number; $x++) {
                $params = array();
                $params['qty'] = '1';//product quantity
//                $_product = $this->product->load($pId);
                $_product = $this->_productRepository->getById($pId);
                if ($_product) {
                    $this->cart->addProduct($_product, $params);
                    $this->cart->save();
                }
                $pId++;
            }

            $this->messageManager->addSuccess(__("Add " . $number . " to cart successfully."));
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addException(
                $e,
                __('%1', $e->getMessage())
            );
        } catch (\Exception $e) {
            $this->messageManager->addException($e, __('error.'));
        }
        /*cart page*/
        $this->getResponse()->setRedirect('/22/checkout/cart');
    }
}