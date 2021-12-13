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

const BABY_LANTERNFISH = 9;

const RELIEVED_LANTERNFISH = 7;

const BIRTHING_LANTERNFISH = 0;

CONST BYE_MSG = "Ok, goodbye! " . BYE_ICON . "\n";

const EXIT_MSG = "you're not taking this matter seriously so goodbye! " . ANGRY_ICON . "\n";

const INTRO_MSG = "\nThe sea floor is getting steeper. Maybe the sleigh keys got carried this way?
A massive school of glowing lanternfish swims past. They must spawn quickly to
reach such large numbers -maybe exponentially quickly? We have modeled their
growth rate to be sure. We found that each lanternfish creates a new lanternfish 
once every 7 days.  \n\nDo you want to try this modeling? (y/n): ";

