<?php

/*************************************************************************************************
 ******** Auxiliary Constants to handle some values in code & console printed messages ***********
 *************************************************************************************************/

const FISH_ICON = "\u{1F41F}";

const CALENDAR_ICON = "\u{1F4C5}";

const BYE_ICON = "\u{1F44B}";

const ANGRY_ICON = "\u{1F624}";

const ASK_FOR_INITIAL_STATE = FISH_ICON . " Initial State: ";

const ASK_FOR_DAYS = CALENDAR_ICON . "  Days: ";

const INITIAL_STATE_NODE = "initialState";

const DAYS_NODE = "days";

const INTRO_MSG_TYPE = "intro_msg";

const EXPLAIN_MSG_TYPE = "explain_msg";

const BABY_LANTERNFISH = 8;

const RELIEVED_LANTERNFISH = 6;

const BIRTHING_LANTERNFISH = 0;

const NEARLY_BIRTHING_LANTERNFISH = 1;

CONST BYE_MSG = "Ok, take care! " . BYE_ICON . "\n\n";

const EXIT_MSG = "you're not taking this matter seriously so goodbye! " . ANGRY_ICON . "\n\n";

const INTRO_MSG = "\nThe sea floor is getting steeper. Maybe the sleigh keys got carried this way?
A massive school of glowing lanternfish swims past. They must spawn quickly to
reach such large numbers -maybe exponentially quickly? We have modeled their
growth rate to be sure. We found that each lanternfish creates a new lanternfish 
once every 7 days.  \n\nDo you want to try this modeling? (y/n): ";

const EXPLAIN_MSG = "Due to, this spawn process isn't necessarily synchronized between every 
lanternfish, you can model each fish as a single number that represents the 
number of days until it creates a new lanternfish. Furthermore, a new 
lanternfish would surely need slightly longer before it's capable of 
producing more lanternfish: two more days for its first cycle.\n
So you have to assign each initial fish a number depending on its state, 
that it's like an internal timer from 6 to 0, where each unit is a day and 
0 is a fish about to give birth, so the next day reset to 6 cause it can 
initialize its cycle again.\n
- Please enter the state of each fish with a number (0 - 6) separated by a 
comma (for example: 3,2,3,1,5,4,6) and then the number of days to compute: \n\n";

