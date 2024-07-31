import { Gameplayer } from './gameplayer';
import { Player } from './player';
export interface Game {
  id: number;
  status: string;
  created_at: string;
  players?: Player[];
  gameplayers?: Gameplayer[];
}
