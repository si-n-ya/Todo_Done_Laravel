@php
class Calender
{
public $prev;
public $next;
public $yearMonth;
private $_thisMonth;
private $_calender_date;

public function __construct()
{

try {
if (!isset($_GET['t']) || !preg_match('/\A\d{4}-\d{2}\z/', $_GET['t'])) {
throw new \Exception();
} else {
$this->_thisMonth = new \DateTime($_GET['t']);
}
} catch (\Exception $e) {
$this->_thisMonth = new \DateTime('first day of this month');
}

$this->prev = $this->_createPrevLink();
$this->next = $this->_createNextLink();
$this->yearMonth = $this->_thisMonth->format('F Y');
}

private function _createPrevLink()
{
$dt = clone $this->_thisMonth;
return $dt->modify('-1 month')->format('Y-m');
}

private function _createNextLink()
{
$dt = clone $this->_thisMonth;
return $dt->modify('+1 month')->format('Y-m');
}

public function show()
{
$tail = $this->_getTail();
$body = $this->_getBody();
$head = $this->_getHead();
$html = '<tr>' . $tail . $body . $head . '</tr>';
echo $html;
}

private function _getTail()
{
$tail = '';
$lastDayOfPrevMonth = new \DateTime('last day of ' . $this->yearMonth . ' -1 month');
while ($lastDayOfPrevMonth->format('w') < 6) { $tail=sprintf('<td class="gray date">%d</td>',
    $lastDayOfPrevMonth->format('d')) . $tail;
    $lastDayOfPrevMonth->sub(new \DateInterval('P1D'));
    }
    return $tail;
    }

    private function _getBody()
    {
    $body = '';
    $period = new \DatePeriod(
    new \DateTime('first day of ' . $this->yearMonth),
    new \DateInterval('P1D'),
    new \DateTime('first day of ' . $this->yearMonth . ' +1 month')
    );

    $today = new \DateTime('today');
    foreach ($period as $day) {

    $title = '';
    foreach (session()->get('todos') as $todo) {
    if ($todo->calender_date == $day->format('Y-m-d')) {
    $title = mb_substr($todo->title, 0, 3, 'utf-8') . '&#133;';
    break;
    } else {
    $title = '';
    }
    }

    if ($day->format('w') === '0') {
    $body .= "</tr>
    <tr>";
        }

        $todayClass = ($day->format('Y-m-d') === $today->format('Y-m-d')) ? 'today' : '';

        $body .= '<td class="youbi_' . $day->format('w') . ' ' . $todayClass . ' ' . 'date"><a href="/todo_done/index?id=' .
            $day->format('Y') . '-' . $day->format('m') . '-' .
            $day->format('d') . '" class="link_date">' . $day->format('j') . '<p class="title">' . $title . '</p></a>
        </td>';
        }
        session()->forget('todos');
        return $body;
        }

        private function _getHead()
        {
        $head = '';
        $firstDayOfNextMonth = new \DateTime('first day of ' . $this->yearMonth . ' +1 month');
        while ($firstDayOfNextMonth->format('w') > 0) {
        $head .= sprintf('<td class="gray date">%d</td>', $firstDayOfNextMonth->format('d'));
        $firstDayOfNextMonth->add(new \DateInterval('P1D'));
        }
        return $head;
        }
        }
        @endphp