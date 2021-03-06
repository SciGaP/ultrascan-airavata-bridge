<?php
namespace Airavata\Model\Data\Movement;

/**
 * Autogenerated by Thrift Compiler (0.10.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


final class DMType {
  const COMPUTE_RESOURCE = 0;
  const STORAGE_RESOURCE = 1;
  static public $__names = array(
    0 => 'COMPUTE_RESOURCE',
    1 => 'STORAGE_RESOURCE',
  );
}

/**
 * Enumeration of security sshKeyAuthentication and authorization mechanisms supported by Airavata. This enumeration just
 *  describes the supported mechanism. The corresponding security credentials are registered with Airavata Credential
 *  store.
 * 
 * USERNAME_PASSWORD:
 *  A User Name.
 * 
 * SSH_KEYS:
 *  SSH Keys
 * 
 * FIXME: Change GSI to a more precise generic security protocol - X509
 * 
 */
final class SecurityProtocol {
  const USERNAME_PASSWORD = 0;
  const SSH_KEYS = 1;
  const GSI = 2;
  const KERBEROS = 3;
  const OAUTH = 4;
  const LOCAL = 5;
  static public $__names = array(
    0 => 'USERNAME_PASSWORD',
    1 => 'SSH_KEYS',
    2 => 'GSI',
    3 => 'KERBEROS',
    4 => 'OAUTH',
    5 => 'LOCAL',
  );
}

/**
 * Enumeration of data movement supported by Airavata
 * 
 * SCP:
 *  Job manager supporting the Portal Batch System (PBS) protocol. Some examples include TORQUE, PBSPro, Grid Engine.
 * 
 * SFTP:
 *  The Simple Linux Utility for Resource Management is a open source workload manager.
 * 
 * GridFTP:
 *  Globus File Transfer Protocol
 * 
 * UNICORE_STORAGE_SERVICE:
 *  Storage Service Provided by Unicore
 * 
 */
final class DataMovementProtocol {
  const LOCAL = 0;
  const SCP = 1;
  const SFTP = 2;
  const GridFTP = 3;
  const UNICORE_STORAGE_SERVICE = 4;
  static public $__names = array(
    0 => 'LOCAL',
    1 => 'SCP',
    2 => 'SFTP',
    3 => 'GridFTP',
    4 => 'UNICORE_STORAGE_SERVICE',
  );
}

/**
 * Data Movement through Secured Copy
 * 
 * alternativeSCPHostName:
 *  If the login to scp is different than the hostname itself, specify it here
 * 
 * sshPort:
 *  If a non-default port needs to used, specify it.
 */
class SCPDataMovement {
  static $_TSPEC;

  /**
   * @var string
   */
  public $dataMovementInterfaceId = "DO_NOT_SET_AT_CLIENTS";
  /**
   * @var int
   */
  public $securityProtocol = null;
  /**
   * @var string
   */
  public $alternativeSCPHostName = null;
  /**
   * @var int
   */
  public $sshPort = 22;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'dataMovementInterfaceId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'securityProtocol',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'alternativeSCPHostName',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'sshPort',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['dataMovementInterfaceId'])) {
        $this->dataMovementInterfaceId = $vals['dataMovementInterfaceId'];
      }
      if (isset($vals['securityProtocol'])) {
        $this->securityProtocol = $vals['securityProtocol'];
      }
      if (isset($vals['alternativeSCPHostName'])) {
        $this->alternativeSCPHostName = $vals['alternativeSCPHostName'];
      }
      if (isset($vals['sshPort'])) {
        $this->sshPort = $vals['sshPort'];
      }
    }
  }

  public function getName() {
    return 'SCPDataMovement';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->dataMovementInterfaceId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->securityProtocol);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->alternativeSCPHostName);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->sshPort);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('SCPDataMovement');
    if ($this->dataMovementInterfaceId !== null) {
      $xfer += $output->writeFieldBegin('dataMovementInterfaceId', TType::STRING, 1);
      $xfer += $output->writeString($this->dataMovementInterfaceId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->securityProtocol !== null) {
      $xfer += $output->writeFieldBegin('securityProtocol', TType::I32, 2);
      $xfer += $output->writeI32($this->securityProtocol);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->alternativeSCPHostName !== null) {
      $xfer += $output->writeFieldBegin('alternativeSCPHostName', TType::STRING, 3);
      $xfer += $output->writeString($this->alternativeSCPHostName);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->sshPort !== null) {
      $xfer += $output->writeFieldBegin('sshPort', TType::I32, 4);
      $xfer += $output->writeI32($this->sshPort);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

/**
 * Data Movement through GridFTP
 * 
 * alternativeSCPHostName:
 *  If the login to scp is different than the hostname itself, specify it here
 * 
 * sshPort:
 *  If a non-default port needs to used, specify it.
 */
class GridFTPDataMovement {
  static $_TSPEC;

  /**
   * @var string
   */
  public $dataMovementInterfaceId = "DO_NOT_SET_AT_CLIENTS";
  /**
   * @var int
   */
  public $securityProtocol = null;
  /**
   * @var string[]
   */
  public $gridFTPEndPoints = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'dataMovementInterfaceId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'securityProtocol',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'gridFTPEndPoints',
          'type' => TType::LST,
          'etype' => TType::STRING,
          'elem' => array(
            'type' => TType::STRING,
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['dataMovementInterfaceId'])) {
        $this->dataMovementInterfaceId = $vals['dataMovementInterfaceId'];
      }
      if (isset($vals['securityProtocol'])) {
        $this->securityProtocol = $vals['securityProtocol'];
      }
      if (isset($vals['gridFTPEndPoints'])) {
        $this->gridFTPEndPoints = $vals['gridFTPEndPoints'];
      }
    }
  }

  public function getName() {
    return 'GridFTPDataMovement';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->dataMovementInterfaceId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->securityProtocol);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::LST) {
            $this->gridFTPEndPoints = array();
            $_size0 = 0;
            $_etype3 = 0;
            $xfer += $input->readListBegin($_etype3, $_size0);
            for ($_i4 = 0; $_i4 < $_size0; ++$_i4)
            {
              $elem5 = null;
              $xfer += $input->readString($elem5);
              $this->gridFTPEndPoints []= $elem5;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('GridFTPDataMovement');
    if ($this->dataMovementInterfaceId !== null) {
      $xfer += $output->writeFieldBegin('dataMovementInterfaceId', TType::STRING, 1);
      $xfer += $output->writeString($this->dataMovementInterfaceId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->securityProtocol !== null) {
      $xfer += $output->writeFieldBegin('securityProtocol', TType::I32, 2);
      $xfer += $output->writeI32($this->securityProtocol);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->gridFTPEndPoints !== null) {
      if (!is_array($this->gridFTPEndPoints)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('gridFTPEndPoints', TType::LST, 3);
      {
        $output->writeListBegin(TType::STRING, count($this->gridFTPEndPoints));
        {
          foreach ($this->gridFTPEndPoints as $iter6)
          {
            $xfer += $output->writeString($iter6);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

/**
 * Data Movement through UnicoreStorage
 * 
 * unicoreEndPointURL:
 *  unicoreGateway End Point. The provider will query this service to fetch required service end points.
 */
class UnicoreDataMovement {
  static $_TSPEC;

  /**
   * @var string
   */
  public $dataMovementInterfaceId = "DO_NOT_SET_AT_CLIENTS";
  /**
   * @var int
   */
  public $securityProtocol = null;
  /**
   * @var string
   */
  public $unicoreEndPointURL = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'dataMovementInterfaceId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'securityProtocol',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'unicoreEndPointURL',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['dataMovementInterfaceId'])) {
        $this->dataMovementInterfaceId = $vals['dataMovementInterfaceId'];
      }
      if (isset($vals['securityProtocol'])) {
        $this->securityProtocol = $vals['securityProtocol'];
      }
      if (isset($vals['unicoreEndPointURL'])) {
        $this->unicoreEndPointURL = $vals['unicoreEndPointURL'];
      }
    }
  }

  public function getName() {
    return 'UnicoreDataMovement';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->dataMovementInterfaceId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->securityProtocol);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->unicoreEndPointURL);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('UnicoreDataMovement');
    if ($this->dataMovementInterfaceId !== null) {
      $xfer += $output->writeFieldBegin('dataMovementInterfaceId', TType::STRING, 1);
      $xfer += $output->writeString($this->dataMovementInterfaceId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->securityProtocol !== null) {
      $xfer += $output->writeFieldBegin('securityProtocol', TType::I32, 2);
      $xfer += $output->writeI32($this->securityProtocol);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->unicoreEndPointURL !== null) {
      $xfer += $output->writeFieldBegin('unicoreEndPointURL', TType::STRING, 3);
      $xfer += $output->writeString($this->unicoreEndPointURL);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

/**
 * LOCAL
 * 
 * alternativeSCPHostName:
 *  If the login to scp is different than the hostname itself, specify it here
 * 
 * sshPort:
 *  If a non-defualt port needs to used, specify it.
 */
class LOCALDataMovement {
  static $_TSPEC;

  /**
   * @var string
   */
  public $dataMovementInterfaceId = "DO_NOT_SET_AT_CLIENTS";

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'dataMovementInterfaceId',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['dataMovementInterfaceId'])) {
        $this->dataMovementInterfaceId = $vals['dataMovementInterfaceId'];
      }
    }
  }

  public function getName() {
    return 'LOCALDataMovement';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->dataMovementInterfaceId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('LOCALDataMovement');
    if ($this->dataMovementInterfaceId !== null) {
      $xfer += $output->writeFieldBegin('dataMovementInterfaceId', TType::STRING, 1);
      $xfer += $output->writeString($this->dataMovementInterfaceId);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

/**
 * Data Movement Interfaces
 * 
 * dataMovementInterfaceId: The Data Movement Interface has to be previously registered and referenced here.
 * 
 * priorityOrder:
 *  For resources with multiple interfaces, the priority order should be selected.
 *   Lower the numerical number, higher the priority
 * 
 */
class DataMovementInterface {
  static $_TSPEC;

  /**
   * @var string
   */
  public $dataMovementInterfaceId = null;
  /**
   * @var int
   */
  public $dataMovementProtocol = null;
  /**
   * @var int
   */
  public $priorityOrder = 0;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'dataMovementInterfaceId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'dataMovementProtocol',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'priorityOrder',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['dataMovementInterfaceId'])) {
        $this->dataMovementInterfaceId = $vals['dataMovementInterfaceId'];
      }
      if (isset($vals['dataMovementProtocol'])) {
        $this->dataMovementProtocol = $vals['dataMovementProtocol'];
      }
      if (isset($vals['priorityOrder'])) {
        $this->priorityOrder = $vals['priorityOrder'];
      }
    }
  }

  public function getName() {
    return 'DataMovementInterface';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->dataMovementInterfaceId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->dataMovementProtocol);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->priorityOrder);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('DataMovementInterface');
    if ($this->dataMovementInterfaceId !== null) {
      $xfer += $output->writeFieldBegin('dataMovementInterfaceId', TType::STRING, 1);
      $xfer += $output->writeString($this->dataMovementInterfaceId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->dataMovementProtocol !== null) {
      $xfer += $output->writeFieldBegin('dataMovementProtocol', TType::I32, 2);
      $xfer += $output->writeI32($this->dataMovementProtocol);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->priorityOrder !== null) {
      $xfer += $output->writeFieldBegin('priorityOrder', TType::I32, 3);
      $xfer += $output->writeI32($this->priorityOrder);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}


