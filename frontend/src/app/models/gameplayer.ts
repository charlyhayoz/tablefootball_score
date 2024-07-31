import { Game } from './game';
import { Player } from './player';

export interface Gameplayer {
  id: number;
  score: number;
  win: number;
  player_id: number;
  game_id: number;
  game?: Game[];
  player?: Player[];
}
